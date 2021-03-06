<div class="mt-5">
    <div class="row">
        <!-- Listagem Modalidades -->
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Modalidades</h4>
                    <p class="card-category">Modalidades Cadastradas </p>
                </div>
                <div class="card-body table-responsive">
                    <?php if (sizeof($modalities) > 0) : ?>
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Editar</th>
                                <th>Apagar</th>
                            </thead>
                            <tbody>
                                @foreach($modalities as $key => $modality)
                                <tr>
                                    <td>{{$key}}</td>
                                    <td>{{$modality->name}}</td>
                                    <td>{{ $modality->description }}</td>
                                    <td><a class="edit" href="{{ route('modality.edit', $modality->slug)}}"><i class="material-icons">edit</i></a></td>
                                    <td><a class="delete" href="{{ route('modality.delete', $modality->slug) }}"><i class="material-icons">close</i></a></td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="col-lg-12 mt-3">
                            <h5>Nenhuma modalidade cadastrada ainda!</h5>
                        </div> 
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>