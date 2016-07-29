<?php
// auto-generated by sfViewConfigHandler
// date: 2016/07/26 14:11:25
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', '汇聚控股后台管理系统', false, false);

  $response->addStylesheet('/css/apps/admin/reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/sfPropel15Plugin/css/global.css', '', array ());
  $response->addStylesheet('/sfPropel15Plugin/css/default.css', '', array ());
  $response->addStylesheet('apps/admin/app.css', '', array ());
  $response->addJavascript('jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('jquery-ui-1.8.4.custom.min.js', '', array ());
  $response->addJavascript('/js/3rd/tiny_mce/tiny_mce.js', '', array ());
  $response->addJavascript('/js/3rd/kindeditor/kindeditor-min.js', '', array ());
  $response->addJavascript('/js/3rd/kindeditor/lang/zh_CN.js', '', array ());
  $response->addJavascript('/js/apps/admin/app.js', '', array ());


