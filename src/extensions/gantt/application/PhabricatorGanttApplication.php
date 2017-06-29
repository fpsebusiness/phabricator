<?php

class PhabricatorGanttApplication extends PhabricatorApplication {

  public function getName() {
    return pht('Phame');
  }

  public function getBaseURI() {
    return '/gantt/';
  }

  public function getIcon() {
    return 'fa-feed';
  }

  public function getShortDescription() {
    return pht('Gantt Charts for tasks');
  }

  public function getTitleGlyph() {
    return "\xe2\x9c\xa9";
  }

  public function getHelpDocumentationArticles(PhabricatorUser $viewer) {
    return array(
      array(
        'name' => pht('Phame User Guide'),
        'href' => PhabricatorEnv::getDoclink('Phame User Guide'),
      ),
    );
  }

  public function getRoutes() {
    return array(
      '/gantt/' => array(
        '' => 'GanttController',
      ),
    );
  }
  /*
  public function getResourceRoutes() {
    return array(
      '/phame/' => $this->getResourceSubroutes(),
    );
  }

  private function getResourceSubroutes() {
    return array(
      'r/(?P<id>\d+)/(?P<hash>[^/]+)/(?P<name>.*)' =>
        'PhameResourceController',
    );
  }

  public function getBlogRoutes() {
    return $this->getLiveRoutes();
  }

  private function getLiveRoutes() {
    return array(
      '/' => array(
        '' => 'PhameBlogViewController',
        'post/(?P<id>\d+)/(?:(?P<slug>[^/]+)/)?' => 'PhamePostViewController',
      ),

    );
  }

  public function getQuicksandURIPatternBlacklist() {
    return array(
      '/phame/live/.*',
    );
  }

  public function getRemarkupRules() {
    return array(
      new PhamePostRemarkupRule(),
    );
  }


  protected function getCustomCapabilities() {
    return array(
      PhameBlogCreateCapability::CAPABILITY => array(
        'default' => PhabricatorPolicies::POLICY_USER,
        'caption' => pht('Default create policy for blogs.'),
      ),
    );
  } */

}
