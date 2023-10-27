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

    $confirmation_message = array(
        'titulo' => '',
        'mensaje' => '',
        'icon' => ''
    );    

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invitado'])) {

        $invitado = sanitize_text_field($_POST['invitado']);
        $existing_post_id = get_page_by_title($invitado, OBJECT, 'invitado');

        if ($existing_post_id) {

            $confirmation_message['titulo'] = '¡Hola, ' . esc_html($invitado) . '!';
            $confirmation_message['mensaje'] = 'Parece que ya habias confirmado tu asistencia. <br> Por favor, comunícate con nosotros.';
            $confirmation_message['icon'] = get_template_directory_uri() . '/assets/src/img/astonished.png';

        } else {

            $asistencia = sanitize_text_field($_POST['asistencia']);
            $acompanado = sanitize_text_field($_POST['acompanado']);
            $restriccion = sanitize_text_field($_POST['restriccion']);
            $indicaciones = sanitize_text_field($_POST['indicaciones']);

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

            $confirmation_message['titulo'] = '¡Hola, ' . esc_html($invitado) . '!';

            if($asistencia == "Asistiré"){
                $confirmation_message['mensaje'] = 'Tu asistencia ha sido confirmada. <br> ¡Nos encanta contar con tu presencia!';
                $confirmation_message['icon'] =  get_template_directory_uri() . '/assets/src/img/star-struck.png';
            } else{
                $confirmation_message['mensaje'] = 'Es una lástima que no puedas acompañarnos.';
                $confirmation_message['icon'] = get_template_directory_uri() . '/assets/src/img/broken_heart.png';
            }
        }
        
    } ?>
    
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
                    $nombreInvitadoAdicional = get_sub_field('nombre_invitado_adicional');
                    $aditional_guestName = $nombreInvitadoAdicional ? 'data-name-extraGuest="' . $nombreInvitadoAdicional . '"' : '';
                    $options[$nombre] = array('value' => $value, 'additional_attr' => $additional_attr, 'additional_guestName' => $aditional_guestName);
                }
                asort($options); ?>
                <select class="invitados" name="invitado" id="invitado" required>
                    <option></option>
                    <?php foreach ($options as $nombre => $data) : ?>
                        <option value="<?= $nombre; ?>" <?= $data['additional_attr'] . $data['additional_guestName']; ?>><?= $nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php } ?>            
        </fieldset>

        <fieldset class="asistence">
            <legend>Asistencia:</legend>
            <div>
                <input type="radio" id="asistire" name="asistencia" value="Asistiré" required>
                <label for="asistire">Asistiré 🤩 </label>
            </div>
            <div>
                <input type="radio" id="no-asistire" name="asistencia" value="No asistiré">
                <label for="no-asistire">No asistiré 💔 </label>
            </div>
        </fieldset>

        <fieldset class="extra-guest">
            <legend>¿Vendrás acompañado de <span id="nombreInvitadoAdicional"></span>  ?</legend>
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
        <input type="submit" value="Confirmar">
    </form> 
    
    <?php if (!empty($confirmation_message['titulo'])) : 
        $whatsAppIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 258"><defs><linearGradient id="IconifyId18b6cec513eb39496" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1FAF38"/><stop offset="100%" stop-color="#60D669"/></linearGradient><linearGradient id="IconifyId18b6cec513eb39497" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#F9F9F9"/><stop offset="100%" stop-color="#FFF"/></linearGradient></defs><path fill="url(#IconifyId18b6cec513eb39496)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a122.994 122.994 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#IconifyId18b6cec513eb39497)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416Zm40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513l10.706-39.082Z"/><path fill="#FFF" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561c0 15.67 11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716c-3.186-1.593-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg>'; ?>
        <script>
            function confirmationMessage() {
                $('html, body').animate({
                    scrollTop: $('#confirmacion').offset().top
                }, 100);

                setTimeout(function() {
                    Swal.fire({
                        title: '<?= $confirmation_message['titulo']; ?>',
                        html: '<?= $confirmation_message['mensaje']; ?>',
                        imageUrl: '<?= $confirmation_message['icon']; ?>',
                        imageWidth: 75,
                        imageHeight: 75,
                        showConfirmButton : false,
                        showCloseButton: true,
                        <?php  if ($existing_post_id) : ?>
                        footer: '<div class="contact-wp"> <a href="https://api.whatsapp.com/send?phone=573175426428" target="_BLANK"> <?= $whatsAppIcon; ?> Tatiana</a>  <a href="https://api.whatsapp.com/send?phone=573022530968" target="_BLANK"> <?= $whatsAppIcon; ?> Andrés</a> </div>   ',
                        <?php endif; ?>
                    });
                }, 1000);
            }
            window.onload = confirmationMessage;
        </script>
    <?php endif; 
    

    $form_html = ob_get_clean();
    return $form_html;
}
add_shortcode('rsvp-form', 'rsvp_form');