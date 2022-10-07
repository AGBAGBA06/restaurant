
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container">

                <div class="section-title">
                    <h2>Check our tasty <span>Menu</span></h2>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="menu-flters">
                             @foreach ($categories as $categorie)
					  <li><a href="/select_by_cat/{{ $categorie->category_name}}"  class="{{(request()
					  ->is('/select_by_cat/'.$categorie->category_name)? 'Active':'') }}">
						{{ $categorie->category_name}}</a></li>
					  @endforeach
                        </ul>
                    </div>
                </div>





                <div class="row menu-container">

                        @foreach ($product as $produit)
                        <div class="col-lg-6 menu-item filter-starters">
                            <div class="menu-content">
                            <a href="#">{{$produit->nom}}</a><span>${{$produit->prix}}</span>
                            </div>
                            <div class="menu-ingredients">
                                {{$produit->description}}
                            </div>
                        </div>
                        @endforeach

                </div>

            </div>
        </section>
        <!-- End Menu Section -->