<?php
class FES_Pushover_Field extends FES_Field {

	/** @var bool For 3rd parameter of get_post/user_meta */
	public $single = true;

	/** @var array Supports are things that are the same for all fields of a field type. Like whether or not a field type supports jQuery Phoenix. Stored in obj, not db. */
	public $supports = array(
		'multiple'    => false,
		'forms'       => array(
			'registration'     => true,
			'submission'       => false,
			'vendor-contact'   => false,
			'profile'          => true,
			'login'            => false,
		),
		'position'    => 'custom',
		'phoenix'     => true,
		'permissions' => array(
			'can_remove_from_formbuilder' => true,
			'can_change_meta_key'         => false,
			'can_add_to_formbuilder'      => true,
		),
		'input_type'  => 'custom_pushover',
		'title'       => 'Pushover', // l10n on output
	);

	/** @var array Characteristics are things that can change from field to field of the same field type. Like the placeholder between two text fields. Stored in db. */
	public $characteristics = array(
		'name'        => 'ckpn_user_key',
		'is_meta'     => true,  // in object as public (bool) $meta;
		'public'      => true,
		'required'    => false,
		'label'       => '',
		'css'         => '',
		'default'     => '',
		'size'        => '',
		'help'        => '',
		'placeholder' => '',
		'class'       => 'FES_Pushover_Field', /** we don't use this yet, but future, store the name of the class used for a field on the field in the db */
	);

	/** Returns the HTML to render a field in admin */
	public function render_field_admin( $user_id = -2, $readonly = -2 ) {
		if ( $user_id === -2 ) {
			$user_id = get_current_user_id();
		}

		if ( $readonly === -2 ) {
			$readonly = $this->readonly;
		}

		$user_id   = apply_filters( 'fes_render_pushover_field_user_id_admin', $user_id, $this->id );
		$readonly  = apply_filters( 'fes_render_pushover_field_readonly_admin', $readonly, $user_id, $this->id );
		$value     = $this->get_field_value_admin( $this->save_id, $user_id, $readonly );

		ob_start(); ?>
        <div class="fes-fields">
           <input class="textfield<?php echo $this->required_class( $readonly ); ?>" id="<?php echo $this->name(); ?>" type="text" data-required="<?php echo $this->required( $readonly ); ?>" data-type="text"<?php $this->required_html5( $readonly ); ?> name="<?php echo esc_attr( $this->name() ); ?>" placeholder="<?php echo esc_attr( $this->placeholder() ); ?>" value="<?php echo esc_attr( $value ) ?>" size="<?php echo esc_attr( $this->size() ); ?>" <?php echo $readonly ? 'disabled' : ''; ?> />
        </div>
        <?php
		return ob_get_clean();
	}

	/** Returns the HTML to render a field in frontend */
	public function render_field_frontend( $user_id = -2, $readonly = -2 ) {
		if ( $user_id === -2 ) {
			$user_id = get_current_user_id();
		}

		if ( $readonly === -2 ) {
			$readonly = $this->readonly;
		}

		$user_id   = apply_filters( 'fes_render_pushover_field_user_id_frontend', $user_id, $this->id );
		$readonly  = apply_filters( 'fes_render_pushover_field_readonly_frontend', $readonly, $user_id, $this->id );
		$value     = $this->get_field_value_frontend( $this->save_id, $user_id, $readonly );

		ob_start(); ?>
        <div class="fes-fields">
           <input class="textfield<?php echo $this->required_class( $readonly ); ?>" id="<?php echo $this->name(); ?>" type="text" data-required="<?php echo $this->required( $readonly ); ?>" data-type="text"<?php $this->required_html5( $readonly ); ?> name="<?php echo esc_attr( $this->name() ); ?>" placeholder="<?php echo esc_attr( $this->placeholder() ); ?>" value="<?php echo esc_attr( $value ) ?>" size="<?php echo esc_attr( $this->size() ); ?>" <?php echo $readonly ? 'disabled' : ''; ?> />
        </div>
        <?php
		return ob_get_clean();
	}

	/** Returns the HTML to render a field for the formbuilder */
	public function render_formbuilder_field( $index ) {
		$removable = isset( $this->supports[ 'permissions' ][ 'can_remove_from_formbuilder' ] ) ? $this->supports[ 'permissions' ][ 'can_remove_from_formbuilder' ] : true;
		ob_start(); ?>
        <li class="custom-field pushover_field">
            <?php FES_Formbuilder_Templates::legend( $this->characteristics[ 'label' ], $this->characteristics, $removable ); ?>
            <?php FES_Formbuilder_Templates::hidden_field( "[$index][input_type]", 'pushover' ); ?>
            <?php FES_Formbuilder_Templates::hidden_field( "[$index][template]", 'pushover_field' ); ?>

            <div class="fes-form-holder">
                <?php FES_Formbuilder_Templates::common( $index, '', true, $this->characteristics, !$removable, 'pushover' ); ?>
                <?php FES_Formbuilder_Templates::common_text( $index, $this->characteristics ); ?>
            </div>
        </li>
        <?php
		return ob_get_clean();
	}
}
add_action( 'fes_save_field_after_save', 'ckpn_save_fes_field', 10, 3 );
function ckpn_save_fes_field( $save_id, $value, $user_id ){
	if ( $this->characteristics[ 'name' ] == 'custom_pushover' ){
		ckpn_update_user_to_keys_list( $user_id, $value[ 'custom_pushover' ] );
	}
}