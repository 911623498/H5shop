<?php
namespace Home\CheckParam;
/**
 * ȱ�ٲ�������ʾ
 */
class CheckUser extends BaseCheck
{


    /**
     * ����¼�ӿ��Ƿ�ȱ�ٲ���
     */
    public function user($data)
    {
		$check_param_template = array(

            /**
             * type ��ʾ����
             * is_must ��ʾ�Ƿ����[1������]
             * enum ��ʾ���������������ֵ֮��
             */
            'pageNum' => array(
                'type' => 's',
                'is_must' => 1  
            ),'sou' => array(
                'type' => 's',
                'is_must' => 1  
            )
        );

        return $this -> checkParam( $data , $check_param_template );
	}
	
	
}