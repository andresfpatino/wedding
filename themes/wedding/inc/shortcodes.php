<?php

/**
 * Description: Shortcode link button within the content
 * Usage: [button link="https://www.google.com.co" target="_blank" size="large"]go to google[/button]
 */
function themeWedding__buttons($atts = [], $content = null){

    $a = shortcode_atts(array(
        'class' => 'btn',
        'color' => '',
        'style' => '',
        'size'  => '',
        'link'  =>  '/#',
        'target' => '_self'
    ), $atts);

    if (!empty($a["link"])){
        $siteUrl = get_bloginfo('url');
        $linkDomain = parse_url($a["link"])['host']; //get domain link, example: ( namedomain.com )

        // Check if link button has a domain example: ( namedomain.com )
        if (!empty($linkDomain)){
            $btnLink = $a["link"];
        }
        else{
            $btnLink = $siteUrl . $a["link"];
        }
    }
    if (str_replace(' ', '', $a["target"]) == '_blank'){
        $attsTargetrel = 'rel="noreferrer noopener"';
    }
    return '<a class="' . esc_attr($a['class']) . ' ' . esc_attr($a['color']) . ' ' . esc_attr($a['style']) . ' ' . esc_attr($a['size']) . '"  href="' . esc_attr($btnLink) . '" ' . $attsTargetrel . ' target="' . esc_attr($a['target']) . '" >
                    ' . $content .
        '</a>';
}
add_shortcode('button', 'themeWedding__buttons');

/**
 * Description: Separator
 * Usage: [separator]
 */
function themeWedding__separator(){
    return '
        <div class="separator">
            <span></span>
            <svg width="24" height="21" viewBox="0 0 24 21" fill="none"><path d="M21.5484 1.83955C19.0957 -0.613184 15.119 -0.613184 12.6664 1.83955C12.1293 2.37659 11.2586 2.37659 10.7216 1.83955C8.26884 -0.613184 4.29225 -0.613184 1.83951 1.83955C-0.613171 4.29224 -0.613171 8.26887 1.83951 10.7216L2.81195 11.6939L11.3235 20.2055C11.5281 20.4101 11.8598 20.4101 12.0644 20.2055L20.576 11.6939L21.5484 10.7216C24.0011 8.26887 24.0011 4.29224 21.5484 1.83955Z" fill="#8FA99D"/></svg>
            <span></span>
        </div>';
}
add_shortcode('separator', 'themeWedding__separator');

/**
 * Description: Form used to RSVP
 * Usage: [rsvp-form]
 */
 function rsvp_form() {
    ob_start();

    $acompanado = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invitado'])) {
        $invitado = sanitize_text_field($_POST['invitado']);
        $asistencia = sanitize_text_field($_POST['asistencia']);
        $acompanado = sanitize_text_field($_POST['acompanado']);
        $restriccion = sanitize_text_field($_POST['restriccion']);
        $indicaciones = sanitize_text_field($_POST['indicaciones']);

        if (isset($_POST['invitado']) && isset($_POST['acompanado']) && $_POST['acompanado'] === 'Si, iré acompañado') {
            $acompanado = 'Si, iré acompañado';
        }

        $post_data = array(
            'post_title' => $invitado,
            'post_type' => 'invitado',
            'post_status' => 'publish',
        );

        $post_id = wp_insert_post($post_data);

        update_post_meta($post_id, 'asistencia', $asistencia);
        update_post_meta($post_id, 'acompanado', $acompanado);
        update_post_meta($post_id, 'restriccion', $restriccion);
        update_post_meta($post_id, 'indicaciones', $indicaciones);

        $domain = $_SERVER['REQUEST_URI'] . "#confirmacion";

        wp_safe_redirect(esc_url($domain));

        exit;
    }
    
    ?>

    <form class="rsvp-form" method="POST" autocomplete="off">
        <fieldset>
            <legend>Nombre:</legend> <?php
            if (have_rows('lista_invitados', 'option')) {
                $options = array();
                while (have_rows('lista_invitados', 'option')) {
                    the_row();
                    $nombre = get_sub_field('nombre');
                    $value = str_replace(' ', '-', strtolower($nombre));
                    $invitado_adicional = get_sub_field('con_invitado_adicional');
                    $additional_attr = $invitado_adicional == "true" ? 'data-additional="true"' : '';
                    $options[$nombre] = array('value' => $value, 'additional_attr' => $additional_attr);
                }
                asort($options); ?>
                <select class="invitados" name="invitado" id="invitado" required>
                    <option></option>
                    <?php foreach ($options as $nombre => $data) : ?>
                        <option value="<?= $nombre; ?>" <?= $data['additional_attr']; ?>><?= $nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php } ?>            
        </fieldset>

        <fieldset class="asistence">
            <legend>Asistencia:</legend>
            <div>
                <input type="radio" id="asistire" name="asistencia" value="Asistiré" required>
                <label for="asistire">Asistiré 🥳 </label>
            </div>
            <div>
                <input type="radio" id="no-asistire" name="asistencia" value="No asistiré">
                <label for="no-asistire">No asistiré 💔 </label>
            </div>
        </fieldset>

        <fieldset class="extra-guest">
            <legend>¿Vendrás acompañado?</legend>
            <div>
                <input type="radio" id="si-acompanado" name="acompanado" value="Si, iré acompañado">
                <label for="si-acompanado">Si </label>
            </div>
            <div>
                <input type="radio" id="no-acompanado" name="acompanado" value="No, iré solo">
                <label for="no-acompanado">No</label>
            </div>
        </fieldset>

        <fieldset class="restrictions">
            <legend>¿Tienes alguna restricción nutricional?</legend>
            <div>
                <input type="radio" id="si-restriccion" name="restriccion" value="Si">
                <label for="si-restriccion">Si </label>
            </div>
            <div>
                <input type="radio" id="no-restriccion" name="restriccion" value="No">
                <label for="no-restriccion">No</label>
            </div>
            <div class="indicaciones">
                <label for="indicaciones">Por favor indícanos qué debemos tener en cuenta</label>
                <textarea name="indicaciones" id="indicaciones"></textarea>
            </div>
        </fieldset>

        <div id="agradecimiento" style="display: none;">
            <p>¡Gracias por confirmar tu asistencia!</p>
        </div>

        <input type="submit" value="Confirmar">
    </form>  <?php

    $form_html = ob_get_clean();
    return $form_html;
}
add_shortcode('rsvp-form', 'rsvp_form');