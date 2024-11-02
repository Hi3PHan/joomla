<?php
namespace Joomla\Component\HelloWorld\Site\Model;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class StudentsModel extends ListModel
{
    protected $table_name = '#__students';

    /**
     * Lấy danh sách sinh viên từ cơ sở dữ liệu
     * @return array Danh sách sinh viên
     */
//    public function getStudsents()
//    {
//        $db = $this->getDbo();
//        $query = $db->getQuery(true)
//            ->select('*')
//            ->from($this->table_name)
//            ->order($this->getState('list.ordering', 'name') . ' ' . $this->getState('list.direction', 'ASC'));
//        $db->setQuery($query);
//        return $db->loadObjectList();
//    }
    public function getStudents()
    {

        // Lấy đối tượng cơ sở dữ liệu để thực hiện các truy vấn SQL
        $db = $this->getDatabase();
        // Khởi tạo đối tượng truy vấn SQL mới
        $query = $db->getQuery(true)
            // Chọn tất cả các cột từ bảng sinh viên
            ->select('*')
            // Xác định bảng cần truy vấn (bảng sinh viên)
            ->from($this->table_name)
            ->order($this->getState('list.ordering', 'Lop') . ' ' . $this->getState('list.direction', 'ASC'));
        // Thiết lập truy vấn SQL cho đối tượng cơ sở dữ liệu


        $db->setQuery($query);
        // Thực hiện truy vấn và trả về danh sách sinh viên dưới dạng danh sách đối tượng
        return $db->loadObjectList();
    }
}