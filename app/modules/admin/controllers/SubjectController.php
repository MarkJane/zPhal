<?php

namespace ZPhal\Modules\Admin\Controllers;

use ZPhal\Models\Subjects;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
use ZPhal\Modules\Admin\Library\Paginator\Pager;

class SubjectController extends ControllerBase
{

    public function initialize()
    {
        parent::initialize();
    }

    /**
     * 专题列表
     */
    public function indexAction()
    {
        // 当前页数
        $currentPage = abs($this->request->getQuery('page', 'int', 1));
        if ($currentPage == 0) {
            $currentPage = 1;
        }

        $subjects = Subjects::find()->toArray();

        $tree = makeTree($subjects, 'subject_id', 'parent');
        $treeHtmlArray = subjectTreeHtml($tree);


        $pager = new Pager(
            new PaginatorArray(
                [
                    'data' => $treeHtmlArray,
                    'limit'=> 20,
                    'page' => $currentPage,
                ]
            ),
            [
                'layoutClass' => 'ZPhal\Modules\Admin\Library\Paginator\Pager\Layout\Bootstrap', // 样式类
                'rangeLength' => 5, // 分页长度
                'urlMask' => '?page={%page_number}', // 额外url传参
            ]
        );

        $this->view->setVars(
            [
                "pager" => $pager,
            ]
        );

    }

    /**
     * 添加专题
     */
    public function newAction()
    {
        /**
         * 当前专题列表
         */
        $subjects = Subjects::find()->toArray();

        $tree = makeTree($subjects, 'subject_id', 'parent');
        $treeHtml = treeHtml($tree, 'subject_id', 'subject_name');

        $this->view->setVars(
            [
                "subjectTree" => $treeHtml,
            ]
        );
    }

    /**
     * 创建新专题
     * @return \Phalcon\Http\Response|\Phalcon\Http\ResponseInterface
     */
    public function saveAction()
    {
        if ($this->request->isPost()) {
            $name = $this->request->getPost('name', ['string', 'trim']);
            $slug = $this->request->getPost('slug', ['string', 'trim', 'lower']);
            $parent = $this->request->getPost('parent', 'int', 0);
            $description = $this->request->getPost('description', ['string', 'trim']);

            if (empty($name)) {
                $this->flash->error('请输入专题名称');
                return $this->response->redirect("admin/subject/new");
            }

            if (empty($slug)) {
                $this->flash->error('必须输入别名');
                return $this->response->redirect("admin/subject/new");
            }

            // 检测是否上传文件
            if ($this->request->hasFiles()) {
                $files = $this->request->getUploadedFiles(); // 获取上传的文件

                if (!$files[0]->getName()) {
                    $this->flash->error('请上传一个封面');
                    return $this->response->redirect("admin/subject/new");
                }

                $extra = ['name' => $slug];

                // 上传视频
                $media = $this->di->get('mediaUpload');
                $upload = $media->uploadMedia($files[0], 'cover', $extra);

                if ($upload['status'] == 'success') {
                    $url = $upload['data']['url'];

                    $subject = new Subjects();
                    $subject->subject_name = $name;
                    $subject->subject_slug = $slug;
                    $subject->subject_image = $url;
                    $subject->subject_description = $description;
                    $subject->parent = $parent;

                    if ($subject->create()) {
                        $this->flash->success("创建成功");
                        return $this->response->redirect("admin/subject");
                    } else {
                        $this->flash->error($this->getErrorMsg($subject, "创建失败"));

                    }
                } else {
                    $this->flash->error("文件上传失败：" . $upload['message']);
                }
            }
        }

        return $this->response->redirect("admin/subject/new");
    }

    public function editAction()
    {

    }

    public function updateAction()
    {

    }
}