<div>
    <h4>Salas</h4>
    <?php if (sizeof($allRooms) > 0): ?>
        <!-- Listagem Salas -->
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Salas</h4>
                    <p class="card-category">Salas Cadastradas </p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-primary">
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Editar</th>
                            <th>Apagar</th>
                        </thead>
                        <tbody>
                            @foreach($allRooms as $room)
                                <tr>
                                    <td>{{$room->_id}}</td>
                                    <td>{{$room->name}}</td>
                                    <td>{{ $room->description }}</td>
                                    <td ><a class="edit" href="{{ route('editroom')}}"><i class="material-icons">edit</i></a></td>
                                    <td><a class="delete" 
                                        href="{{ route('deleteroom', [ 'slug' => $room->slug ] ) }}"><i class="material-icons">close</i></a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <?php echo "nenhuma modalidade ainda"; ?>       
    <?php endif; ?>       
</div>