<!--Mensagem de alert para ser apresentado nas view quando desejado-->
<div style="border:1px solid red;padding: 20px;text-align:center; background-color:#FA8072;color:white;border-radius:3px;font-size:19px">
    <!--slot, recebe os dados, que foram declarados dentro da views onde os componentes foram declarados -->
    {{$slot}}
</div>