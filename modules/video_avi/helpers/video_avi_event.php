<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class video_avi_event_Core {
  static function add_extensions($allowed_extensions) {
    //$allowed_extensions[count($allowed_extensions)] = "avi";
    $allowed_extensions->append("avi");
  }

  static function jpeg_thumb_extension($items_with_jpeg_thumb) {
    $items_with_jpeg_thumb->append("video_avi");
  }

  static function no_resize_item_type($items_without_resize) {
    $items_without_resize->append("video_avi");
  }

  static function use_ffmpeg_for_thumb($ffmpeg_item_types) {
    $ffmpeg_item_types->append("video_avi");
  }

  static function create_new_avi($other_item, $parent, $entry, $name, $title, $description, $owner_id) {
    $other_item = video_avi::create($parent, $entry->file, $name, $title, $description, $owner_id);
  }
}