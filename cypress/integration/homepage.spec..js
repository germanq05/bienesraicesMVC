/// <references types="cypress" />
describe('Carga la Pagina Principal', () => { //Describe que hace esta prueba
    it('Prueba el Header de la Pagina Principal', () => {
        cy.visit('/'); //Visita esa url

        cy.get('[data-cy="heading-sitio"]').should('exist'); //Selecciona lo que querramos de esta forma, es igual a querySelector de js
        //should() verifica si existe o no
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal', 'Venta de Casas y Departamentos'); // Invoke(): Lee el texto. Should('equals', ....): Verifica si es igual
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('not.equal', 'Bienes Raices'); // Invoke(): Lee el texto. Should('not.equals', ....): Verifica si es distinto

    });

    //Selecciona los iconos
    it('Prueba el Bloque de los Iconos Principales', () => {
        cy.get('[data-cy="heading-nosotros"]').should('exist');
        cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equals', 'H2'); //Debe tener la propiedad

        //Selecciona los iconos
        cy.get('[data-cy="iconos-nosotros"]').should('exist');
        //Probar que son 3 iconos
        cy.get('[data-cy="iconos-nosotros"]').find('.icono').should('have.length', 3); //Permite selecciona el DIV donde se encuentra y todos los hijos
        //have.length verifica si la cantidad de clases dentro de iconos-nosotros, con la clase .icono, son tres
        //not.have.length hace lo contrario
    });


    it('Prueba el Bloque de Casas y Departamentos en venta', () => {
        //Debe haber 3 propiedades
        cy.get('[data-cy="anuncio"]').should('have.length', 3);
        cy.get('[data-cy="anuncio"]').should('not.have.length', 5);

        //Probar el enlace de las propiedades
        cy.get('[data-cy="enlace-propiedad"]').should('have.class', 'boton-amarillo-block');
        cy.get('[data-cy="enlace-propiedad"]').first().invoke('text').should('equals', 'Ver Propiedad');
        //Simular click para verificar el router a una propiedad
        cy.get('[data-cy="enlace-propiedad"]').first().click();
        cy.get('[data-cy="titulo-propiedad"]').should('exist');

        cy.wait(1000); //espera 1seg
        cy.go('back'); //Vuelve a la pagina principal
    });


    it('Prueba el Routing hacia todas las Propiedades', () => {
        cy.get('[data-cy="todas-propiedades"]').should('exist');
        cy.get('[data-cy="todas-propiedades"]').should('have.class', 'boton-verde');
        cy.get('[data-cy="todas-propiedades"]').invoke('attr', 'href').should('equals', '/propiedades'); //corroborar que nos lleve a la URL indicada

        //Entrar al link, ver si el titulo esta bien y salir
        cy.get('[data-cy="todas-propiedades"]').click();
        cy.get('[data-cy="heading-propiedades"]').invoke('text').should('equals', 'Casas y Departamentos en Venta');
        cy.wait(1000);
        cy.go('back');
    });
});