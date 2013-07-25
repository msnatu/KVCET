<?php

if ($pager->haveToPaginate()) {
  $searchTermText = $search_term ? '&' . $search_parameter . '=' . $search_term : '';
  echo link_to('Latest', $searchUrl . '?page=' . $pager->getFirstPage() . $searchTermText);
  echo link_to('prev', $searchUrl . '?page=' . $pager->getPreviousPage() . $searchTermText);
  $links = $pager->getLinks();
  foreach ($links as $page) {
    echo ($page == $pager->getPage()) ? $page : link_to($page, $searchUrl . '?page=' . $page . $searchTermText, 'class=”pager”');
  }
  echo link_to('next', $searchUrl . '?page=' . $pager->getNextPage() . $searchTermText, 'class=”pager”');
  echo link_to('Oldest', $searchUrl . '?page=' . $pager->getLastPage() . $searchTermText, 'class=”pager”');
}