<form role="search" method="get" class="search-form form-inline" action="<?= esc_url(home_url('/')); ?>">
  <label class="sr-only">Suche nach:</label>
  <div class="input-group">
    <input type="search" value="" name="s" class="search-field form-control" placeholder="Suche auf wolfzeit.com" required>
    <span class="input-group-btn">
      <button type="submit" class="search-submit btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
    </span>
  </div>
</form>
