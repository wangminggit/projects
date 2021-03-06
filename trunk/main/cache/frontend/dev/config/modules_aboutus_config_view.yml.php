<?php
// auto-generated by sfViewConfigHandler
// date: 2016/08/05 15:01:55
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'recruitSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'contactSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'lawSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'indexSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'recruitSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', '关于我们', false, false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/head.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/app.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/aboutus/recruit.css', '', array ());
  $response->addJavascript('/js/jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('/js/jquery-1.8.3.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('scrolltopcontrol.js', '', array ());
  $response->addJavascript('/js/head.js', '', array ());
}
else if ($templateName.$this->viewName == 'contactSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', '关于我们', false, false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/head.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/app.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/aboutus/contact.css', '', array ());
  $response->addJavascript('/js/jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('/js/jquery-1.8.3.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('scrolltopcontrol.js', '', array ());
  $response->addJavascript('/js/head.js', '', array ());
}
else if ($templateName.$this->viewName == 'lawSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', '关于我们', false, false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/head.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/app.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/aboutus/detail.css', '', array ());
  $response->addJavascript('/js/jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('/js/jquery-1.8.3.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('scrolltopcontrol.js', '', array ());
  $response->addJavascript('/js/head.js', '', array ());
}
else if ($templateName.$this->viewName == 'indexSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', '关于我们', false, false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/head.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/app.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/aboutus/module.css', '', array ());
  $response->addJavascript('/js/jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('/js/jquery-1.8.3.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('scrolltopcontrol.js', '', array ());
  $response->addJavascript('/js/head.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('reset.css', '', array ());
  $response->addStylesheet('/css/3rd/font-awesome/css/font-awesome.min.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/head.css', '', array ());
  $response->addStylesheet('/css/apps/frontend/app.css', '', array ());
  $response->addJavascript('/js/jquery-1.7.2.min.js', '', array ());
  $response->addJavascript('/js/jquery-1.8.3.min.js', '', array ());
  $response->addJavascript('jquery.tools.min.js', '', array ());
  $response->addJavascript('scrolltopcontrol.js', '', array ());
  $response->addJavascript('/js/head.js', '', array ());
}

