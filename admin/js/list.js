$(document).ready(function(){



            //Link publicar
            $('#publish').click(function(){
                location.href = 'index.php?s=new';
            });



             //Link Ver
            $('.ver').click(function(){
                var id = $(this).attr('id');
                window.open('../post.php?id='+id);
            });



            //Eliminar publicacion
            $('.delete').click(function(){
                var id = $(this).attr('id');
                $.ajax({

                    type: 'POST',
                    url: '../core/actions/goDelete.php',
                    data: {id:id},
                    success: function(d){
                        $("#respuesta").slideDown();
                        $("#respuesta").html(d);
                        $('#respuesta2').modal('show');
                        $('.modal').click(function(){
                            location.reload();
                        });
                    }
                });

            });



             //Ocultar publicacion
            $('.hide').click(function(){
                var id = $(this).attr('id'); //id de publicacion
                var status = $(this).attr('status'); //id del status
                var modo = $(this).attr('modo');
                $.ajax({

                    type: 'POST',
                    url: '../core/actions/goHide.php',
                    data: {id:id, status:status, modo:modo},
                    success: function(d){
                        $("#respuesta").slideDown();
                        $("#respuesta").html(d);
                        $('#respuesta2').modal('show');
                        $('.modal').click(function(){
                            location.reload();
                        });
                    }
                });
                return false;
            });



            //Editar publicacion
            $('.edit').click(function(){
                var id = $(this).attr('id'); //id de publicacion
                var modo = $(this).attr('modo');      
                location.href = 'index.php?s=edit&id='+id+'&type='+modo;
            });



        });