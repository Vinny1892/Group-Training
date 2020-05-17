<!-- arquivo responsavel por listar todas as modalidades -->

    <div class="modality-page-container">
        <div class="main-content">
            <h5 class="title-categories">Modalidades</h5>
            <div class="search-categories">
                <div class="search-input">
                    <input type="text" placeholder="Pesquise por nome">
                </div>
                <div class="order">
                    <span class="title-order">Ordenar por:</span>

                    <div>
                        <div class="input-field">
                            <select>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">Nome</option>
                                <option value="2">Usuários ativos</option>
                                <option value="4">Por Categoria</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid-categories">
                @foreach ($modalities as $modality)
                    <div class="category">
                        <a href=" {{ route('salas', $modality) }}">
                            <div class="image-category" style="background-image: url('{{$modality->pathImage}}')">
                                <img src="" alt="">
                            </div>
                            <div class="description">
                                <span class="category-name">{{$modality->name}}</span>
                               <!-- TODO , a fazer
                                <span class="category-active-users">{{$modality->activeUsers}} usuarios ativos</span> -->
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>