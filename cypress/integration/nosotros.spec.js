/// <reference types="cypress" />

describe('Prueba Pagina Nosotrs', () => {

    it('Probando Titulo', () => {
        cy.visit('/nosotros');
        cy.get('[data-cy="nosotros-titulo"]').should('exist');
    });

    it('Probando Imagen', () => {
        cy.get('[data-cy="nosotros-imagen"]').find('img').should('exist');
    });

    it('Probando Texto', () => {
        /*cy.get('[data-cy="nosotros-texto"]').find('blockquote').invoke('text').should('equal', '25 Años de Experiencia');
        cy.get('[data-cy="nosotros-texto"]').find('p').eq(0).invoke('text').should('equal', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque minima at inventore blanditiis corporis sit possimus rerum obcaecati distinctio, vitae, ut voluptate sint dolorem repellendus placeat eaque reprehenderit nihil similique amet maiores! Reprehenderit recusandae accusantium voluptate obcaecati, id ipsum quidem modi nobis consequatur illum dolores.');
        cy.get('[data-cy="nosotros-texto"]').find('p').eq(1).invoke('text').should('equal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita non, mollitia nemo culpa odit fugit ipsum optio, sequi in iure nisi nulla perspiciatis quae distinctio dolor necessitatibus animi eos rerum! Distinctio aperiam dolore quamlabore minima delectus. Voluptas ea aspernatur nihil vel inventore ullam expedita error!');*/
    });

});