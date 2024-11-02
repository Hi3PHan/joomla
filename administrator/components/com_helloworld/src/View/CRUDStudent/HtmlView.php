<?php

namespace Joomla\Component\HelloWorld\Administrator\View\CRUDStudent;

use JFactory;
use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use JToolbarHelper;

defined("_JEXEC") or die;

class HtmlView extends BaseHtmlView
{
    protected $form;
    protected $item;


    public function display($tpl = null)
    {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->addToolbar();
        return parent::display($tpl);

//        $this->form = $this->get('Form');
//        JFactory::getApplication()->input->set('hidemainmenu', true);
//        JToolbarHelper::title("Nhập thông tin sinh viên");
//        return parent::display($tpl);

//        // Điều hướng về danh sách sinh viên sau khi lưu thành công
//        if (Factory::getApplication()->input->getCmd('task') === 'save') {
//            $this->setRedirect(JRoute::_('index.php?option=com_helloworld', false));
//        }
    }

    protected function addToolbar()
    {
        JFactory::getApplication()->input->set('hidemainmenu', true);


        if(empty($this->item->Masv)){
            // Hiển thị tiêu đề và thêm nút "Lưu" và "Hủy"
            ToolbarHelper::title('Nhập thông tin sinh viên');
            ToolbarHelper::save('CRUDStudent.save', 'Thêm');
            ToolbarHelper::cancel('CRUDStudent.cancel', 'Hủy');
        }
        else{
            // Hiển thị tiêu đề và thêm nút "Lưu" và "Hủy"
            ToolbarHelper::title('Sửa thong tin sinh viên');
            ToolbarHelper::save('CRUDStudent.save', 'Lưu');
            ToolbarHelper::cancel('CRUDStudent.cancel', 'Hủy');
        }

    }
}

