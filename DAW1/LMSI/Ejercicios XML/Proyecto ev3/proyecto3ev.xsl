<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <link rel="stylesheet" type="text/css" href="estilo.css"/>
                <script SRC="proyecto3ev.js"/>
            </head>

            <body>
                <h1>NUESTRO CATÁLOGO</h1>

                <div id="menu">
                    <table>
                        <tr>
                            <th><button onclick="mostrarTodo()">Todas las plataformas</button></th>
                            <th><button onclick="mostrarCategoria('PS4')">PS4</button></th>
                            <th><button onclick="mostrarCategoria('XBOX ONE')">XBOX ONE</button></th>
                            <th><button onclick="mostrarCategoria('Nintendo Switch')">Nintendo</button></th>
                        </tr>
                    </table>
                </div>
                
                <div id="cuerpo">
                        <br/>
                        <xsl:for-each select="catalogo/juego">
                        <xsl:sort select="plataforma" order="descending"/>
                            <table>
                                <tr>
                                    <td rowspan="3" id="logo">
                                        <img width="100%">
                                            <xsl:attribute name="src">
                                                images/<xsl:value-of select="logotipo"/>
                                            </xsl:attribute>
                                        </img>
                                    </td>
                                    <th colspan="2" id="title"><xsl:value-of select="titulo"/></th>
                                </tr>
                                <tr><td colspan="2">
                                        <xsl:value-of select="descripcion"/>
                                    </td></tr>
                                <tr>
                                    <td>
                                        <xsl:value-of select="precio"/>
                                        <br/>
                                        <button>Comprar</button><br/><br/>
                                        Para <p class="platform"><xsl:value-of select="plataforma"/></p>
                                    </td>
                                    <td>
                                        Distribuidor:
                                        <a>
                                            <xsl:attribute name="target">
                                                _blank
                                            </xsl:attribute>
                                            <xsl:attribute name="href">
                                                <xsl:value-of select="web/@enlace"/>
                                            </xsl:attribute>
                                            <xsl:value-of select="empresa"/>
                                        </a>
                                    </td>
                                </tr>
                                
                            </table>
                            <hr/>
                    </xsl:for-each>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet> 