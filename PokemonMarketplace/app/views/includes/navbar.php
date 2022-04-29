
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container">
    <a class="navbar-brand" href="<?= URLROOT ?>">PokeMarket</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= URLROOT ?>/profile/my_profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URLROOT ?>/saves">Saves</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URLROOT ?>/transactions">Transactisons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URLROOT ?>/deposit">Deposit</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URLROOT ?>/login/logout">Logout</a>
        </li>
      </ul>
      <form class="d-flex mb-0 ms-auto" action="/eCommerce22/PokemonMarketplace/Search/getResult/" mthode="POST">
        <input class="form-control me-2" name="search_text" type="search" placeholder="Search" aria-label="Search">
        <select name="search_type">
              <option value="newFirst" selected>newest to oldest</option>
              <option value="oldFirst">oldest to newest</option>
              <option value="highFirst">higher price first</option>
              <option value="lowFirst">lower price first</option>
            </select>
            <select name="rarity" style="margin-left: 10px">
              <option value="all" selected>All</option>
              <option value="oldFirst">Common</option>
              <option value="rare">Rare</option>
              <option value="epic">Epic</option>
              <option value="legendary">Legendary</option>
            </select>
        <button class="btn btn-outline-success" type="submit" name="search" style="margin-left: 10px">Search</button>
        
      </form>
    </div>
  </div>
</nav>