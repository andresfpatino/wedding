<?php

/**
 *
 * Description: Shortcode link button within the content
 *
 * Usage: [button link="https://www.google.com.co" target="_blank" size="large"]go to google[/button]
 *
 */
function themeWedding__buttons($atts = [], $content = null)
{

    $a = shortcode_atts(array(
        'class' => 'btn',
        'color' => '',
        'style' => '',
        'size'  => '',
        'link'  =>  '/#',
        'target' => '_self'
    ), $atts);

    if (!empty($a["link"]))
    {
        $siteUrl = get_bloginfo('url');
        $linkDomain = parse_url($a["link"])['host']; //get domain link, example: ( namedomain.com )

        // Check if link button has a domain example: ( namedomain.com )
        if (!empty($linkDomain))
        {
            $btnLink = $a["link"];
        }
        else
        {
            $btnLink = $siteUrl . $a["link"];
        }
    }
    if (str_replace(' ', '', $a["target"]) == '_blank')
    {
        $attsTargetrel = 'rel="noreferrer noopener"';
    }
    return '<a class="' . esc_attr($a['class']) . ' ' . esc_attr($a['color']) . ' ' . esc_attr($a['style']) . ' ' . esc_attr($a['size']) . '"  href="' . esc_attr($btnLink) . '" ' . $attsTargetrel . ' target="' . esc_attr($a['target']) . '" >
                    ' . $content .
        '</a>';
}

add_shortcode('button', 'themeWedding__buttons');



function themeWedding__separator(){
    return '
        <div class="separator">
            <span></span>
            <svg width="24" height="21" viewBox="0 0 24 21" fill="none"><path d="M21.5484 1.83955C19.0957 -0.613184 15.119 -0.613184 12.6664 1.83955C12.1293 2.37659 11.2586 2.37659 10.7216 1.83955C8.26884 -0.613184 4.29225 -0.613184 1.83951 1.83955C-0.613171 4.29224 -0.613171 8.26887 1.83951 10.7216L2.81195 11.6939L11.3235 20.2055C11.5281 20.4101 11.8598 20.4101 12.0644 20.2055L20.576 11.6939L21.5484 10.7216C24.0011 8.26887 24.0011 4.29224 21.5484 1.83955Z" fill="#8FA99D"/></svg>
            <span></span>
        </div>';
}

add_shortcode('separator', 'themeWedding__separator');
