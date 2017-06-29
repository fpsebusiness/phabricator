<?php

class GanttController extends PhabricatorController {

  protected function buildSideNavView() {
    $user = $this->getRequest()->getUser();

    $nav = new AphrontSideNavFilterView();
    $nav->setBaseURI(new PhutilURI($this->getApplicationURI()));

    id(new PhabricatorFeedSearchEngine())
      ->setViewer($user)
      ->addNavigationItems($nav->getMenu());

    $nav->selectFilter(null);

    return $nav;
  }

  public function buildApplicationMenu() {
    return $this->buildSideNavView()->getMenu();
  }

  public function shouldAllowPublic() {
    return true;
  }

  public function handleRequest(AphrontRequest $request) {
      return $this->newPage()
        ->setTitle($this->getTitle())
        ->setCrumbs($this->getCrumbs())
        ->appendChild([$this->getContent()]);
  }

  protected function getTitle()
  {
    $title = pht('Gantt Charts');

    return $title;
  }

  protected function getContent()
  {
    $crumbs = $this->buildApplicationCrumbs();
    $crumbs->setBorder(true);

    return $crumbs;
  }

  protected function getContent()
  {
    $title = pht('Recent Posts');

    $header = id(new PHUIHeaderView())
      ->setHeader($title);

    $create_button = id(new PHUIButtonView())
      ->setTag('a')
      ->setText(pht('Create a Blog'))
      ->setHref('/phame/blog/edit/')
      ->setColor(PHUIButtonView::GREEN);

    $post_list = id(new PHUIBigInfoView())
      ->setIcon('fa-star')
      ->setTitle('Welcome to Phame')
      ->setDescription(
        pht('There aren\'t any visible blog posts.'))
      ->addAction($create_button);

    $page = id(new PHUIDocumentViewPro())
      ->setHeader($header)
      ->appendChild($post_list);

    $content_view = id(new PHUITwoColumnView())
      ->setMainColumn([$page])
      /*
      ->setSideColumn(array(
        $blog_list,
        $draft_list,
      )) */
      ->addClass('gantt-home-container');

    $content = phutil_tag_div('gantt-content', $content_view);

    return $content;
  }
}
