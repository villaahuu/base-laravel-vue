<template>
  <div class="container" style="margin-top:120px;margin-bottom:500px;">
    <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
            <span class="sr-only">Interruptor de Navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand" href="#">
              CULTURA
           </a>

        </div>
        <div v-if="!$store.getters.loggedIn" class="collapse navbar-collapse" id="subenlaces">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Entrar</a></li>
          </ul>
        </div>
        <div v-else class="collapse navbar-collapse" id="subenlaces">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Enlace2</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Desplegable <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Acción</a></li>
                <li><a href="#">Otra acción</a></li>
                <li><a href="#">Algo más aquí</a></li>
                <li class="divider"></li>
                <li><a href="#">Enlace separado</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <section class="section">
      <main>
        <router-view></router-view>
      </main>
    </section>
    
  </div>
</template>

<script>
export default {};
</script>