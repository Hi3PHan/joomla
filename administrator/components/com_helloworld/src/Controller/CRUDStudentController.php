<?php

namespace Joomla\Component\HelloWorld\Administrator\Controller;

use Exception;
use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\MVC\Controller\AdminController;
use Joomla\CMS\MVC\Controller\FormController;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\Router\Route;
use JText;

class CRUDStudentController extends FormController
{
    protected $view_list = 'Students';
    //biến view này để set view mặc định sau khi hàm gọi xong phương thức delete

    public function save($key = null, $urlVar = null)
    {
        // Gọi phương thức lưu từ FormController
        $result = parent::save($key, $urlVar);

        // Nếu lưu thành công, điều hướng về danh sách sinh viên
        if ($result) {
            $this->setRedirect(Route::_('index.php?option=com_helloworld&view=students', false), JText::_('COM_STUDENTS_SAVE_SUCCESS'));
        } else {
            // Nếu lưu thất bại, điều hướng về form chỉnh sửa
            $this->setRedirect(Route::_('index.php?option=com_helloworld&view=student&layout=edit', false), JText::_('COM_STUDENTS_SAVE_FAIL'), 'error');
        }

        return $result;
    }

    public function cancel($key = null, $urlVar = null)
    {
        // Gọi phương thức lưu từ FormController
        $result = parent::cancel($key, $urlVar);

        // Nếu lưu thành công, điều hướng về danh sách sinh viên
        if ($result) {
            $this->setRedirect(Route::_('index.php?option=com_helloworld&view=students', false), JText::_('COM_STUDENTS_SAVE_SUCCESS'));
        } else {
            // Nếu lưu thất bại, điều hướng về form chỉnh sửa
            $this->setRedirect(Route::_('index.php?option=com_helloworld&view=student&layout=edit', false), JText::_('COM_STUDENTS_SAVE_FAIL'), 'error');
        }

        return $result;
    }

//    public function delete($key = null, $urlVar = null){
//        $this->checkToken(); //kieem tra token cua trang web
//
//        $primaryKeys = $this->input->get('cid', array(), 'array');
//        // id sinh vien can xoa
//
//        $model = $this->getModel();
//        if ($model->delete($pks)) {
//            $this->setMessage(Text::_('COM_STUDENTMANAGEMENT_DELETE_SUCCESS'));
//        } else {
//            $this->setMessage(Text::_('COM_STUDENTMANAGEMENT_DELETE_FAILED'), 'error');
//        }
//
//        // lấy model
//        // Remove the items.
//        $model->delete($cid);
////        $this->setRedirect(Route::_('index.php?option=com_helloworld&view=students',false),JText::_("Đã xóa Sinh vien"));
//
//
//
////        Factory::getApplication()->enqueueMessage(
////            'Có sinh viên đã bị xóa!',
////            'message'
////        );
//    }
    public function delete()
    {
        // Check for request forgeries
        $this->checkToken();

        // Get items to remove from the request.
        $cid = $this->input->get('cid', array(), 'array');

        // Get the model.
        $model = $this->getModel();

        // Remove the items.
        $model->delete($cid);
        $this->setRedirect(\JRoute::_('index.php?option=com_helloworld'));
    }

    public function add()
    {
        return parent::add(); // TODO: Change the autogenerated stub
    }


}