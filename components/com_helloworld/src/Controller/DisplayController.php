<?php

namespace Joomla\Component\HelloWorld\Site\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;

/**
 * @package     Joomla.Site
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2020 John Smith. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

/**
 * HelloWorld Component Controller
 * @since  0.0.2
 */
class DisplayController extends BaseController {

//    public function display($cachable = false, $urlparams = array()) {
//        $document = Factory::getDocument();
//        $viewName = $this->input->getCmd('view', 'login');
//        $viewFormat = $document->getType();
//
//        $view = $this->getView($viewName, $viewFormat);
//        $view->setModel($this->getModel('Message'), true);
//
//        $view->document = $document;
//        $view->display();
//    }

//    public function display($cachable = false, $urlparams = [])
//    {
//        $document = Factory::getDocument();
//        $viewName = $this->input->getCmd('view', 'login');
//        $viewFormat = $document->getType();
//
//        $view = $this->getView($viewName, $viewFormat);
//        $view->setModel($this->getModel('Students'), true);
//
//        $view->document = $document;
//        $view->display();
//    }

//    public function display($cachable = false, $urlparams = [])
//    {
//        $view = $this->input->getCmd('view', 'students'); // 'students' là view mặc định
//        //Dòng này dùng để lấy tên của view từ yêu cầu (request).
////        'view': Tên tham số cần lấy.
////          'students': Đây là giá trị mặc định được sử dụng nếu không có tham số view trong yêu cầu.
////              Điều này có nghĩa rằng nếu không có view cụ thể nào được yêu cầu, Joomla sẽ mặc định hiển thị view students.
//        $this->input->set('view', $view);
////        Dòng này thiết lập lại tên view trong đầu vào (input) để đảm bảo view chính xác được sử dụng khi hiển thị.
////           Nó giúp đảm bảo rằng tên view sẽ được sử dụng bởi các thành phần khác trong quá trình xử lý.
//        parent::display($cachable, $urlparams);
////        Gọi phương thức display() của lớp cha (BaseController).
////          Phương thức này thực hiện việc xử lý chính để hiển thị view, bao gồm tải và xuất ra HTML của view.
////              $cachable và $urlparams được truyền vào lớp cha để xử lý, giúp quản lý việc cache và truyền tham số cho URL.
//
//        return parent::display($cachable, $urlparams);
//    }

    public function display($cachable = false, $urlparams = array())
    {
        return parent::display();
    }

}