<style>
    ._btn-salvar{
        width: 30%;
    }

    @media(max-width:992px){
        ._btn-salvar{
            width: 100%;
        }
    }
</style>


<p class="mb-5 small">Nesta sessão você pode atualizar os <strong>dados</strong> de <strong>contatos</strong> e <strong>endereço</strong> do seu site!</p>

<!-- contatos e redes sociais -->
<form onsubmit="loading()" action="modulos-admin/contents/dashboard/php/atualizar-contatos.php" method="post" class="row mb-5 pb-5 border-bottom">
    <div class="mb-4 col-12 col-lg-6">
        <label for="instagram" class="small">Instagram*</label>
        <input class="form-control" value="<?= $contatos->instagram; ?>" type="text" required name="instagram" id="instagram">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_instagram" class="small">@ do instagram*</label>
        <input class="form-control" value="<?= $contatos->_instagram; ?>" type="text" required name="@_instagram" id="@_instagram">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="facebook" class="small">Facebook*</label>
        <input class="form-control" value="<?= $contatos->facebook; ?>" type="text" required name="facebook" id="facebook">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_facebook" class="small">@ do facebook*</label>
        <input class="form-control" value="<?= $contatos->_facebook; ?>" type="text" required name="@_facebook" id="@_facebook">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="linkedin" class="small">LinkedIn*</label>
        <input class="form-control" type="text" value="<?= $contatos->linkedin; ?>" required name="linkedin" id="linkedin">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="@_linkedin" class="small">@ do LinkedIn*</label>
        <input class="form-control" type="text" value="<?= $contatos->_linkedin; ?>" required name="@_linkedin" id="@_linkedin">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="email" class="small">E-mail*</label>
        <input class="form-control" type="email" value="<?= $contatos->email; ?>" required name="email" id="email">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="telefone" class="small">Telefone*</label>
        <input class="form-control" type="tel" required value="<?= $contatos->telefone; ?>" name="telefone" id="telefone" maxlength="15" inputmode="tel">
    </div>

    <div class="mb-4 col-12 col-lg-6">
        <label for="wpp" class="small">Whatsapp*</label>
        <input class="form-control" type="tel"value="<?= $contatos->wpp; ?>" required name="wpp" id="wpp" maxlength="15" inputmode="tel">
    </div>

    <div class="col-12">
        <button class="_btn-salvar btn btn-success">Salvar</button>
    </div>
</form>
<!-- contatos e redes sociais -->


<script>
    //mask input tel
    document.getElementById('telefone').addEventListener('keyup', (e)=>{
        let input = e.target
        input.value = phoneMask(input.value)
    })
    document.getElementById('wpp').addEventListener('keyup', (e)=>{
    let input = e.target
    input.value = phoneMask(input.value)
    })


    const phoneMask = (value) => {
        if (!value) return ""
        value = value.replace(/\D/g,'')
        value = value.replace(/(\d{2})(\d)/,"($1) $2")
        value = value.replace(/(\d)(\d{4})$/,"$1-$2")
        return value
    }



    // mask cep
    document.getElementById('cep').addEventListener('keyup', (e) => {
        let input = e.target;
        input.value = cepMask(input.value);
    });
    
    const cepMask = (value) => {
        if (!value) return "";
        value = value.replace(/\D/g, '');
        value = value.replace(/(\d{5})(\d)/, "$1-$2");
        return value;
    };
</script>