<?php
class Controllerwxtest extends WXController{
  public function _index(){
	$data=array();
	$data['header']=$this->load->controller('common/header');
	$data['footer']=$this->load->controller('common/footer');
	$data['wxJsPlugin']=$this->loadWxJsPlugin();
	$this->response->setOutput($this->load->view('wx/test.tpl',$data));
  }
  /*
   * 
   * ������
�ٱ�: "menuItem:exposeArticle"
��������: "menuItem:setFont"
�ռ�ģʽ: "menuItem:dayMode"
ҹ��ģʽ: "menuItem:nightMode"
ˢ��: "menuItem:refresh"
�鿴���ںţ�����ӣ�: "menuItem:profile"
�鿴���ںţ�δ��ӣ�: "menuItem:addContact"
������

���͸�����: "menuItem:share:appMessage"
��������Ȧ: "menuItem:share:timeline"
����QQ: "menuItem:share:qq"
����Weibo: "menuItem:share:weiboApp"
�ղ�: "menuItem:favorite"
����FB: "menuItem:share:facebook"
���� QQ �ռ�/menuItem:share:QZone
������

�༭��ǩ: "menuItem:editTag"
ɾ��: "menuItem:delete"
��������: "menuItem:copyUrl"
ԭ��ҳ: "menuItem:originPage"
�Ķ�ģʽ: "menuItem:readMode"
��QQ������д�: "menuItem:openWithQQBrowser"
��Safari�д�: "menuItem:openWithSafari"
�ʼ�: "menuItem:share:email"
һЩ���⹫�ں�: "menuItem:share:brand"
   * 
   * */
}