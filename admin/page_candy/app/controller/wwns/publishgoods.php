<?php
class Controllerwwnspublishgoods extends WXController{
  public function _index(){
  		$data=array();
  		$data['header']=$this->load->controller('common/header');
  		$data['footer']=$this->load->controller('common/footer');
		$data['wxJsPlugin']=$this->loadWxJsPlugin();
		$data['material']=array(
			array("l"=>"����","i"=>array('���','����','���','������','������','�Ϻ�','ˮ��','ˮĭ��','ս����','����','ɺ��')),
			array("l"=>"����","i"=>array('СҶ��̴','�ƻ���','����','������','����','�°�','����','��������','����')),
			array("l"=>"�ʱ�","i"=>array('�챦ʯ','����ʯ','��ĸ��','����','̹ɣʯ',
										'ɳ����ʯ','����','��ʯ','��ʯ','����ʯ',
										'����','����Ʒ','����Ʒ','���ʯ','����ʯ',
										'ʯ��ʯ','�¹�ʯ','���ʯ','����ʯ','̫��ʯ',
										'�����')),
			array("l"=>"��������","i"=>array(
				"����ʯ","����ʯ","�����","����ʯ","����",
				"��˿��","�ʯ","��ɽ��","��ɽʯ","���ʯ",
				"����ʯ","ʯӢ����","ʯӢ��"
			))
		);
		$data['theme']=array(
			"����","����","�ִ�","����","��׹","����","����","��ָ",
			"����","ָ��","��ָ","����","��׹","�Ҽ�","����","����",
			"���̺�","�����","��ʯ","����","�ֱ�"
		);
		$this->response->setOutput($this->load->view('wwns/publishgoods.tpl',$data));
  }
}