<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav mr-auto">
        <li @if($current == 'index') class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li @if($current == 'products') class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/products">Products</a>
        </li>
        <li @if($current == 'categories') class="nav-item active" @else class="nav-item" @endif>
          <a class="nav-link" href="/categories">Category</a>
        </li>
      </ul>
    </div>
  </nav>