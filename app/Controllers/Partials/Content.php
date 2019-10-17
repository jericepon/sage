<?php

namespace App\Controllers\Partials;

trait Content
{
    public function content()
    {
        return self::get_content();
    }

    /**
     * Get page sections
     *
     * @param $postID int - ID where to get the sections
     * @param $sectionID int - Section starting value
     * @return object
     */
    public static function get_content( $postID=null, $sectionID=0 )
    {
        $data = [];

        if( empty(get_post()->ID) && empty($postID) ) {
            return $data;
        }

        $flexibleContent = get_field( 'sections', $postID );

        if ( !$flexibleContent ) {
            return $data;
        }

        // Set initial section id
        $id = $sectionID;

        foreach ( $flexibleContent as $key => $content ) {
            $functionName = 'cms_' . str_replace( '-', '_', $content[ 'acf_fc_layout' ] );
            $id++;
            $content['id'] = $id;

            if ( method_exists( __CLASS__, $functionName ) ) {
                $thisContent = (object) self::$functionName( $content );

            } else {
                // This will be use if no specific method created below.
                $objectData = array();
                foreach ($content as $index => $item) {
                    if (is_array($item)) {
                        $objectData[$index] = (object) $item;
                    } else {
                        $objectData[$index] = $item;
                    }
                }

                $thisContent = (object) $objectData;
            }

            // Add section id and classes
            if ( !empty( $thisContent ) ) {
                $thisContent->id = $id;
                $thisContent->is_h1 = $id === 1;

                array_push( $data, $thisContent );
            }
        }

        return $data;
    }

    public static function cms_hero_banner( $data )
    {
        $newData = (object)$data;
        $lazyClass = '';

        if ($newData->id != 1) {
            $lazyClass = ' lazy';
        }

        $hasContent = true;
        $image = null;
        $imageMobile = null;
        $imgAttr = [
            'class' => 'hero-image'.$lazyClass,
            'width' => null,
            'height' => null
        ];

        $title = (!empty($data->section_title) && !empty($data->show_section_title)) ? $newData->section_title : '';

        if ( $newData->image_desktop ) {
            $imgAttr[ 'class' ] = 'hero-image d-md-block d-none d-sm-none';//d-none d-sm-none
            $image = wp_get_attachment_image( $newData->image_desktop[ 'ID' ], 'hero-banner', false, $imgAttr );
            $imgAttr[ 'class' ] = 'hero-image d-block d-sm-block d-md-none';// d-md-none
            $imageMobile = wp_get_attachment_image( $newData->image_desktop[ 'ID' ], 'hero-banner-mobile', false, $imgAttr );
        }

        if ( $newData->image_mobile ) {
            $imgAttr[ 'class' ] = 'hero-image d-block d-sm-block d-md-none';// d-md-none
            $imageMobile = wp_get_attachment_image( $newData->image_mobile[ 'ID' ], 'hero-banner-mobile', false, $imgAttr );
        }

        $playOnMobile = [ 'data-showonmobile="true"' ];
        $hasContent = (!empty($title) || !empty($newData->text) || !empty($newData->link));
        $isVideoMp4 = (strpos( $newData->video_url, '.mp4' ) !== false);
        $isVimeoExternal = strpos( $newData->video_url, 'vimeo' ) !== false && strpos( $newData->video_url, 'external' ) !== false;
        $isVideoTag = $isVideoMp4 || $isVimeoExternal;
        $buttonClass = '';

        // iframe embedded videos with content
        if ($hasContent && !$isVideoTag) {
            $buttonClass = 'd-none d-sm-none d-md-flex';
            $playOnMobile = [ 'data-showonmobile="false"' ];

        // If video is set to autoplay
        } elseif ($newData->is_autoplay) {
            $buttonClass = 'd-flex d-sm-flex d-md-none';

            if ( $isVideoTag ) {
                $buttonClass = 'd-none';
            }

        // Video tags with content
        } elseif ($isVideoTag && $hasContent && !$newData->is_autoplay) {
            $buttonClass = 'd-none d-sm-none d-md-flex';
            $playOnMobile = [ 'data-showonmobile="false"' ];
        }

        // Text Color
        if ( $newData->text_color === 'dark' ) {
            $textColor = 'is-dark-text';
        } else {
            $textColor = 'is-light-text';
        }

        // CTA
        $cta = [];
        if ($newData->cta) {
            foreach ($newData->cta as $item) {
                if (empty($item['link'])) { continue; }

                if (isset($item['type']) && $item['type'] === 'ghost') {
                    $classes = $item['color'] === 'dark' ? ' btn-outline-secondary' : ' btn-outline-primary';
                } else {
                    $classes = $item['color'] === 'dark' ? ' btn-primary' : ' btn-secondary';
                }

                array_push( $cta, [
                    'link' => (object) $item['link'],
                    'classes' => $classes,
                ] );
            }
        }

        $isBackground = false;
        if ($newData->is_autoplay) {
            $isBackground = true;
        }

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'title' => $title,
            'show_title' => $newData->show_section_title,
            'text' => $newData->text ?? '',
            'image' => $image,
            'image_mobile' => $imageMobile,
            'is_autoplay' => $newData->is_autoplay,
            'play_button_class' => $buttonClass,
            // 'video_tag' => !empty($newData->video_url) ? VideoHelper::getVideoTag( $newData->video_url, true, false, $newData->is_autoplay, $newData->is_autoplay, $isBackground, '', $playOnMobile ) : null,
            'text_color' => $textColor,
            'links' => $cta
        ];
    }

    public static function cms_text_and_image( $data )
    {
        $newData = (object)$data;
        $hasContent = ( (!empty($data->section_title) && !empty($data->show_section_title))
            || $newData->text
            || $newData->link
            || $newData->image
        );

        $imageSize = wp_is_mobile() ? 'square-small' : 'large';

        return (object)[
            'acf_fc_layout' => $newData->acf_fc_layout,
            'hasContent' => $hasContent,
            'title' => (!empty($data->section_title) && !empty($data->show_section_title)) ? $newData->section_title : '',
            'text' => $newData->text ?? '',
            'link' => is_array( $newData->link ) ? (object)$newData->link : false,
            'image' => $newData->image ? wp_get_attachment_image_url( $newData->image[ 'ID' ], $imageSize ) : '',
            'orderClass' => $newData->layout === 'image_first' ? 'order-md-1' : 'order-md-2',
            'colorScheme' => $newData->color_scheme === 'light_scheme' ? 'is-light' : 'is-dark'
        ];
    }
}
