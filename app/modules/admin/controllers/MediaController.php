<?php
namespace ZPhal\Modules\Admin\Controllers;

use Phalcon\Mvc\View;
use ZPhal\Models\Resources;

class MediaController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $userId = $this->getUserId();

        $resources = $this->modelsManager->createBuilder()
            ->columns(["resource_id", "upload_date", "resource_title", "guid", "resource_type"])
            ->from("ZPhal\Models\Resources")
            ->where("upload_author = {$userId}")
            ->orderBy("resource_id DESC")
            ->limit(10, 0)
            ->getQuery()
            ->execute()
            ->toArray();

        foreach ($resources as $resource){
            //$resource['guid'] = '/'.$resource['guid'];
        }

        $this->view->setVars(
            [
                "resources" => $resources
            ]
        );
    }

    /**
     * 添加媒体页
     */
    public function newAction()
    {
        $this->view->setRenderLevel(
            View::LEVEL_ACTION_VIEW
        );

        $this->assets->addCss("backend/library/bootstrap-fileinput/css/fileinput.min.css", true);
        $this->assets->addJs("backend/library/bootstrap-fileinput/js/fileinput.min.js", true);
        $this->assets->addJs("backend/library/bootstrap-fileinput/js/locales/zh.js", true);
        $this->assets->addJs("backend/library/bootstrap-fileinput/themes/fa/theme.min.js", true);
        /*$this->assets->addJs("backend/js/upload.js", true);*/
    }

    /**
     * 上传操作
     * @return mixed
     */
    public function uploadAction()
    {
        // 检测是否上传文件
        if ($this->request->hasFiles()) {
            $files = $this->request->getUploadedFiles(); // 获取上传的文件

            //$media = new Media();

            $media = $this->di->get('mediaUpload');
            return $media->uploadMedia($files);
        }
    }
}