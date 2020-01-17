
var $collectionHolder;

var $addTagButton = $('<button type="button" class="btn btn-success">Adicionar Contato</button>');

var $valueAdicionar = $("#valueAdicionar");

$(document).ready(function() {
    
    $collectionHolder = $('#contatos_list');

    $collectionHolder.append($addTagButton);

    $collectionHolder.data('index', $collectionHolder.find('.contatos').length);

    // $collectionHolder.find('.contatos').each(function () {
    //     addRemoveButton($(this));
    // });

    $addTagButton.click(function (e) {
        var quantidade = $("#valueAdicionar").val()
        e.preventDefault();
        for(var i = 0; i < quantidade; i++)
        {

            addTagForm();
        }
    })
});

function addTagForm() {

    var prototype = $collectionHolder.data('prototype');
    // console.log(prototype)
    var index = $collectionHolder.data('index');

    var newForm = prototype;

    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    var $card = $('<div class="row" id="teste"</div>');

    $card.append(newForm);

    addRemoveButton($card);

    $("#card_contatos").append($card);
    
}

function addRemoveButton ($card) {
   
    var $removeButton = $('<button class="btn btn-danger">Remover</i></button>');
   
    var $cardFooter = $('<div class="col-md-2" style="margin: auto;"></div>').append($removeButton);
   
    $removeButton.click(function (e) {
        e.preventDefault();

        $(e.target).parents('#teste').remove()
    });

    $card.append($cardFooter);
}

$( init );

function init() {
  $( ".droppable-area1, .droppable-area2" ).sortable({
      connectWith: ".connected-sortable",
      stack: '.connected-sortable ul'
    }).disableSelection();
}

