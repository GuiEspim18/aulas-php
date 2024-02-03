    </main>

    
<footer class="footer bg-dark text-center text-white">
		Microblog é um site fictício desenvolvido para fins didáticos | Senac Penha &copy; 2021
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<?php if($pagina == 'posts.php' || $pagina == 'usuarios.php'){ ?>
<script src="js/confirm-exclusao.js"></script>
<?php } ?>

<?php if($pagina == 'post-insere.php' || $pagina == 'post-atualiza.php'){ ?>
<script src="js/contador-de-caracteres.js"></script>
<?php } ?>

</body>
</html>