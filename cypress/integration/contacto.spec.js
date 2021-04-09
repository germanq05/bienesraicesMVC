/// <reference types="cypress" />

describe('Prueba el Formulario de Contacto', () => {

    it('Prueba la Pagina de Contacto y el Envio de Emails', () => {
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');


        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el Formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llene el Contacto');

        cy.get('[data-cy="formulario-contacto"]').should('exist');

    });

    it('LLena los campos de Formulario', () => {
        cy.get('[data-cy="input-nombre"]').type('German Quiroga');
        cy.get('[data-cy="input-mensaje"]').type('Buenas tardes! Deseo comprar una Casa!');
        cy.get('[data-cy="input-opciones"]').select('Compra'); //Selecciona la opcion Compra
        cy.get('[data-cy="input-precio"]').type('1500000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check(); //Selecciona el primer elemento del check

        cy.wait(3000);

        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="input-telefono"]').type('2352446667');
        cy.get('[data-cy="input-fecha"]').type('2021-04-09');
        cy.get('[data-cy="input-hora"]').type('11:30');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje Enviado');
    });

});