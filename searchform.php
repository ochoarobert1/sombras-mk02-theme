<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
        <input type="search" name="s" id="s" class="form-control" placeholder="<?php _e('Realice su busqueda', 'sombras');?>" aria-label="<?php _e('Realice su busqueda', 'sombras');?>" aria-describedby="button-addon2" value="" />
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
