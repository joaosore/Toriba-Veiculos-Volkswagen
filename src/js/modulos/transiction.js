import Barba from 'barba.js';
import {RemoveMenu} from './header/btns.js';
import {CloseMenu} from './header/animacao-svg.js';
import {startMask} from './mask.js';
import {menu_active} from './header/menu-active.js';
import {startRecaptcha} from './recaptcha.js';

//Formuláro Flutuante
import {init_eventos_formulario_flutuante} from './formulario-flutuante/eventos.js';
import {init_submit_formulario_flutuante} from './formulario-flutuante/submit.js';
import {init_validade_formulario_flutuante} from './formulario-flutuante/validate.js';

//Banners
import {inicial_init_banners} from './banners/carousel.js';

//Calendario
import {init_calendario} from './calendario/calendario.js';

//Home
import {universo_init_carousel} from './home/universo/carousel.js';
import {servico_init_card} from './home/servicos/card.js';
import {seminovos_init_carousel} from './home/seminovos/carousel.js';
import {init_animate_home} from './home/animation.js';

//Zero KM
import {init_animate_zero_km} from './zero-km/animation.js';

//Zero KM Interna
import {init_carousel_zero_km_interna} from './zero-km-interna/carousel.js';
import {init_btn_interesse_zero_km_interna} from './zero-km-interna/btn-cotacao.js';
import {init_animate_zero_km_interna} from './zero-km-interna/animation.js';

//Best Drive
import {init_submit_formulario_best_drive} from './best-drive/experimente/submit.js';
import {init_validade_formulario_best_drive} from './best-drive/experimente/validate.js';
import {init_animate_best_drive} from './best-drive/animation.js';

//Seminovos
import {seminovos_init_filtro} from './seminovos/filtros/filtro.js';
import {seminovos_init_cards} from './seminovos/filtros/cards.js';
import {init_btn_interesse_cotacao} from './seminovos/filtros/cotacao.js';
import {init_animate_seminivos} from './seminovos/animation.js';

//Seminovos Interna
import {inicial_init_carousel_car} from './seminovos-interna/carro/carousel.js';
import {init_btn_interesse_cotacao_seminovos_interna} from './seminovos-interna/carro/cotacao.js';

//Consócio
import {init_submit_formulario_consorcio} from './consorcio/cotacao/submit.js';
import {init_validade_formulario_consorcio} from './consorcio/cotacao/validade.js';
import {init_animate_consorcio} from './consorcio/animation.js';

//Venda seu carro
import {init_submit_formulario_venda_seu_carro} from './venda-seu-carro/compra/submit.js';
import {init_validade_formulario_venda_seu_carro} from './venda-seu-carro/compra/validade.js';
import {init_animate_venda_seu_carro} from './venda-seu-carro/animation.js';

//Agende seu serviço
import {init_submit_formulario_agende} from './agende-seu-servico/agende/submit.js';
import {init_validade_formulario_agende} from './agende-seu-servico/agende/validade.js';
import {init_animate_agende_seu_servico} from './agende-seu-servico/animation.js';

//Acessorios e peças
import {init_submit_formulario_acessorios_e_pecas} from './acessorios-e-pecas/cotacao/submit.js';
import {init_validade_formulario_acessorios_e_pecas} from './acessorios-e-pecas/cotacao/validate.js';
import {init_animate_acessorios_e_pecas} from './acessorios-e-pecas/animation.js';

//PCD
import {init_animate_pcd} from './pcd/animation.js';

//Trabalhe conosco
import {init_validade_formulario_trabalhe_conosco} from './trabalhe-conosco/curriculo/validade.js';
import {init_submit_formulario_trabalhe_conosco} from './trabalhe-conosco/curriculo/submit.js';

//Venda Direta
import {init_btn_venda_direta} from './venda-direta/atendimento/btn.js';
import {init_animate_venda_direta} from './venda-direta/animation.js';

//Footer
import {init_animate_footer} from './footer/animation.js';
import {init_btn_cotacao_seguro} from './footer/btns.js';

var FadeTransition = Barba.BaseTransition.extend({
	start: function() {
		Promise
		.all([this.newContainerLoading, this.fadeOut()])
		.then(this.fadeIn.bind(this));
	},
	fadeOut: function() {
		RemoveMenu();
		CloseMenu();
		$('.loading').fadeIn();
		return $(this.oldContainer).animate({ opacity: 1 }).promise();
	},
	fadeIn: function() {

		$(window).scrollTop(0); // scroll to top here

		var _this = this;
		var $el = $(this.newContainer);
		$(this.oldContainer).hide();
		$el.css({
			visibility : 'visible',
			opacity : 1
		});
		$el.animate({ opacity: 1 }, 400, function() {
			$('.loading').fadeOut();
			_this.done();
		});
	}
});

Barba.Dispatcher.on('transitionCompleted', function(currentStatus, oldStatus, container) { 
	startRecaptcha('Formulario-Flutuante');
	startMask();
	init_eventos_formulario_flutuante();
	init_submit_formulario_flutuante();
	init_validade_formulario_flutuante();
	menu_active();
	init_animate_footer();
	init_btn_cotacao_seguro();
	$('.loading').fadeOut();
});

Barba.Dispatcher.on('initStateChange', function(currentStatus, oldStatus, container) { 
	delete startRecaptcha('Formulario-Flutuante');
	delete startMask();
	delete init_eventos_formulario_flutuante();
	delete init_submit_formulario_flutuante();
	delete init_validade_formulario_flutuante();
	delete menu_active();
	delete init_animate_footer();
	delete init_btn_cotacao_seguro();
});

Barba.Pjax.getTransition = function() {
	return FadeTransition;
};

// Home Page

var Homepage = Barba.BaseView.extend({
	namespace: 'pagehome',
	onEnter: function() {
		inicial_init_banners();
		universo_init_carousel();
		servico_init_card();
		seminovos_init_carousel();
	},
	onEnterCompleted: function() {
		init_animate_home();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete universo_init_carousel();
		delete servico_init_card();
		delete seminovos_init_carousel();
	},
	onLeaveCompleted: function() {
	}	
});
Homepage.init();

// 0 KM
var Zerokmpage = Barba.BaseView.extend({
	namespace: 'pagezerokm',
	onEnter: function() {

	},
	onEnterCompleted: function() {
		init_animate_zero_km();
	},
	onLeave: function() {
	},
	onLeaveCompleted: function() {
	}	
});
Zerokmpage.init();

// 0 KM - Interna
var Zerokmiternapage = Barba.BaseView.extend({
	namespace: 'pagezerokminterna',
	onEnter: function() {
		inicial_init_banners();
		init_carousel_zero_km_interna();
		init_btn_interesse_zero_km_interna();
	},
	onEnterCompleted: function() {
		init_animate_zero_km_interna();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_carousel_zero_km_interna();
		delete init_btn_interesse_zero_km_interna();
	},
	onLeaveCompleted: function() {
	}	
});
Zerokmiternapage.init();

// Best Drive
var Bestdrivepage = Barba.BaseView.extend({
	namespace: 'pagebestdrive',
	onEnter: function() {
		inicial_init_banners();
		init_calendario();
		init_submit_formulario_best_drive();
		init_validade_formulario_best_drive();
		startRecaptcha('Best-Drive');
	},
	onEnterCompleted: function() {
		init_animate_best_drive();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_calendario();
		delete init_submit_formulario_best_drive();
		delete init_validade_formulario_best_drive();
		delete startRecaptcha('Best-Drive');
	},
	onLeaveCompleted: function() {
	}	
});
Bestdrivepage.init();

// Seminovos
var Seminovospage = Barba.BaseView.extend({
	namespace: 'pageseminovos',
	onEnter: function() {
		seminovos_init_filtro();
		seminovos_init_cards();
		init_btn_interesse_cotacao();
	},
	onEnterCompleted: function() {
		
	},
	onLeave: function() {
		delete seminovos_init_filtro();
		delete seminovos_init_cards();
		delete init_btn_interesse_cotacao();
	},
	onLeaveCompleted: function() {
	}	
});
Seminovospage.init();

// Seminovos Interna
var Seminovosinternapage = Barba.BaseView.extend({
	namespace: 'pageseminovosinterna',
	onEnter: function() {
		inicial_init_carousel_car();
		init_btn_interesse_cotacao_seminovos_interna();
	},
	onEnterCompleted: function() {

	},
	onLeave: function() {
		delete inicial_init_carousel_car();
		delete init_btn_interesse_cotacao_seminovos_interna();
	},
	onLeaveCompleted: function() {
	}	
});
Seminovosinternapage.init();

// Consórcio
var Consorciopage = Barba.BaseView.extend({
	namespace: 'pageconsorcio',
	onEnter: function() {
		init_submit_formulario_consorcio();
		init_validade_formulario_consorcio();
		startRecaptcha('Consorcio');
	},
	onEnterCompleted: function() {
		init_animate_consorcio();
	},
	onLeave: function() {
		delete init_submit_formulario_consorcio();
		delete init_validade_formulario_consorcio();
		delete startRecaptcha('Consorcio');
	},
	onLeaveCompleted: function() {
	}	
});
Consorciopage.init();

// Venda seu carro
var Vendaseucarropage = Barba.BaseView.extend({
	namespace: 'pagevendaseucarro',
	onEnter: function() {
		inicial_init_banners();
		init_submit_formulario_venda_seu_carro();
		init_validade_formulario_venda_seu_carro();
		startRecaptcha('Venda-seu-carro');
	},
	onEnterCompleted: function() {
		init_animate_venda_seu_carro();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_submit_formulario_venda_seu_carro();
		delete init_validade_formulario_venda_seu_carro();
		delete startRecaptcha('Venda-seu-carro');
	},
	onLeaveCompleted: function() {
	}	
});
Vendaseucarropage.init();

// Agende seu serviço
var Agendeseuservicopage = Barba.BaseView.extend({
	namespace: 'pageagendeseuservico',
	onEnter: function() {
		inicial_init_banners();
		init_calendario();
		init_submit_formulario_agende();
		init_validade_formulario_agende();
		startRecaptcha('Agende-seu-servico');
	},
	onEnterCompleted: function() {
		init_animate_agende_seu_servico();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_calendario();
		delete init_submit_formulario_agende();
		delete init_validade_formulario_agende();
		delete startRecaptcha('Agende-seu-servico');
	},
	onLeaveCompleted: function() {
	}	
});
Agendeseuservicopage.init();

// Peças e Acessorios
var Pecaseacessoriospage = Barba.BaseView.extend({
	namespace: 'pagepecaseacessorios',
	onEnter: function() {
		inicial_init_banners();
		init_validade_formulario_acessorios_e_pecas();
		init_submit_formulario_acessorios_e_pecas();
		startRecaptcha('Acessorios-e-pecas');
	},
	onEnterCompleted: function() {
		init_animate_acessorios_e_pecas();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_validade_formulario_acessorios_e_pecas();
		delete init_submit_formulario_acessorios_e_pecas();
		delete startRecaptcha('Acessorios-e-pecas');
	},
	onLeaveCompleted: function() {
	}	
});
Pecaseacessoriospage.init();

// Trabalhe conosco
var Trabalheconoscopage = Barba.BaseView.extend({
	namespace: 'pagetrabalheconosco',
	onEnter: function() {
		inicial_init_banners();
		init_validade_formulario_trabalhe_conosco();
		init_submit_formulario_trabalhe_conosco();
		startRecaptcha('Trabalhe-conosco');
	},
	onEnterCompleted: function() {

	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_validade_formulario_trabalhe_conosco();
		delete init_submit_formulario_trabalhe_conosco();
		delete startRecaptcha('Trabalhe-conosco');
	},
	onLeaveCompleted: function() {
	}	
});
Trabalheconoscopage.init();

// Venda Direta
var Vendadiretapage = Barba.BaseView.extend({
	namespace: 'pagevendadireta',
	onEnter: function() {
		inicial_init_banners();
		init_btn_venda_direta();
	},
	onEnterCompleted: function() {
		init_animate_venda_direta();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_btn_venda_direta();
	},
	onLeaveCompleted: function() {
	}	
});
Vendadiretapage.init();

// PCD
var Vendadiretapage = Barba.BaseView.extend({
	namespace: 'pagepcd',
	onEnter: function() {
		inicial_init_banners();
		init_btn_venda_direta();
	},
	onEnterCompleted: function() {
		init_animate_pcd();
	},
	onLeave: function() {
		delete inicial_init_banners();
		delete init_btn_venda_direta();
	},
	onLeaveCompleted: function() {
	}	
});
Vendadiretapage.init();

Barba.Pjax.start();