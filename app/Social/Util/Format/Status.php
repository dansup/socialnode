<?php

namespace App\Social\Util\Format;

class Status {

  public static function parse($collection, $nested = false)
  {
    $items = [];
    foreach($collection as $status) {
      if($nested) {
        $status = $status->status;
      }
      $items[] = [
      'id'  => $status->id,
      'content'  => $status->content,
      'user'  => [
        'name'  => $status->user->name,
        'username'  => $status->user->username,
        'avatar'  => $status->user->avatar_path,
      ],
      'url'   => $status->buildUrl(),
      'timestamp' => [
        'human' => $status->created_at->diffForHumans(),
        'iso8601' => $status->created_at->toIso8601String(),
        'epoch' => $status->created_at->format('U'),
      ],
      ];
    }
    $res = [
    'prev_page' => $collection->previousPageUrl(),
    'next_page' => $collection->nextPageUrl(),
    'per_page' => $collection->perPage(),
    'items' => $items
    ];
    return $res;
  }

}