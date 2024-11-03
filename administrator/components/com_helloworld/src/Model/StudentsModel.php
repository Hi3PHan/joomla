<?php
namespace Joomla\Component\HelloWorld\Administrator\Model;

defined('_JEXEC') or die;

                                                                                                                                                                                                                                                                                                                                                                                            use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\Database\DatabaseDriver;

class StudentsModel extends ListModel
{
    protected $table_name = '#__students';

    /**
     * Lấy danh sách sinh viên từ cơ sở dữ liệu
     * @return array Danh sách sinh viên
     */
    public function getStudents()
    {

        // Lấy đối tượng cơ sở dữ liệu để thực hiện các truy vấn SQL
        $db = $this->getDatabase();
        $query = $db->getQuery(true);
        // Khởi tạo đối tượng truy vấn SQL mới


                       // Chọn tất cả các cột từ bảng sinh viên
        $query->select('*')
                    // Xác định bảng cần truy vấn (bảng sinh viên)
                    ->from($this->table_name)
                    ->order($this->getState('list.ordering', 'Masv') . ' ' . $this->getState('list.direction', 'ASC'))
//                    ->setLimit( $this->getState('list.start'),$this->getState('list.limit'));
        ;
        // Thiết lập truy vấn SQL cho đối tượng cơ sở dữ liệu
//        $db->setQuery($query, $this->getState('list.start'), $this->getState('list.limit'));

        $db->setQuery($query);
          echo "hêlo wolrd";
          echo "Three Time";
          echo "6766";


//        $query->from($db->quoteName('#__students') . ' AS a');
        // Thiết lập bảng cần truy vấn là `#__mywalks` với bí danh `a`.

        // Thực hiện truy vấn và trả về danh sách sinh viên dưới dạng danh sách đối tượng
        return $db->loadObjectList();
    }

//   protected function populateState($ordering = 'Masv', $direction = 'asc')
//{
//    $app = Factory::getApplication();
//
//    // Lấy giá trị giới hạn bản ghi từ yêu cầu của người dùng hoặc từ cấu hình
//    $limit = $app->getUserStateFromRequest($this->context . '.list.limit', 'limit', $app->get('list_limit', 10), 'uint');
//    $this->setState('list.limit', $limit);
//
//    // Lấy vị trí bắt đầu (offset) của trang hiện tại
//    $limitstart = $app->input->get('limitstart', 0, 'uint');
//    $this->setState('list.start', $limitstart);
//
//    // Thiết lập thứ tự sắp xếp và hướng sắp xếp
//    parent::populateState($ordering, $direction);
//}


}
