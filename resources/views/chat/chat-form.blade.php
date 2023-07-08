<div class="card card-primary direct-chat direct-chat-primary">
  <div class="card-header">
    <h3 class="card-title">Registrar Seguimiento</h3>
  </div>

  <div class="card-body">
    <div class="direct-chat-messages" id="chat-messages" style="height: 250px; overflow-y: auto;">
      
        @foreach($messages as $message)

                <div class="direct-chat-msg {{ ($message->id_usuario_from == Auth::id()) ? 'right' : '' }}">

                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name {{ ($message->id_usuario_from == Auth::id()) ? 'float-right' : 'float-left' }} ">{{ $message->user_from->name }}</span>
                      <span class="direct-chat-timestamp {{ ($message->id_usuario_from == Auth::id()) ? 'float-left' : 'float-right' }}">{{ \DateTime::createFromFormat('Y-m-d H:i:s', $message->date)->format('d/m/y H:i') }}</span>
                    </div>
                    <div class="direct-chat-text">
                      {{ $message->message }}
                    </div>
                </div>
         
        @endforeach


    </div>
  </div>
  
  
  <div class="card-footer">
     <form method="GET" action="{{route("message")}}">
                         @csrf
      <div class="input-group">
        <input type="text" name="message" id="message" placeholder="Nuevo Mensaje..." class="form-control" required>
        <input type="text" name="id_solicitud" value="{{$solicitudes->id_contact}}" hidden>
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary {{ ($solicitudes->id_usuario != Auth::id()) && ($solicitudes->id_usuario_assigned != Auth::id()) ? 'disabled' : '' }}" >Enviar</button>
        </span>
      </div>
    </form>
  </div>
</div>


