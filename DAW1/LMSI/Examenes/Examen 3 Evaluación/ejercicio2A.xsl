<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="/">
        <html>
            <head>
                <title>Casas de Poniente </title>
                <meta charset="utf-8" />
                <link rel="stylesheet" type="text/css" href="style.css" />
                <link href="https://fonts.googleapis.com/css?family=Italianno" rel="stylesheet" />
            </head>
            <body>
                <div id="cuerpo">
                <h1>Casas de Poniente</h1>
                    <xsl:for-each select="casas/casa">
                    <xsl:sort select="nombre" order="descending"/>
                        <div class="casa">                 
                            <div class="blason">
                                <img width="207px">
                                    <xsl:attribute name="src">
                                        <xsl:value-of select="blason"/>
                                    </xsl:attribute>
                                </img>
                            </div>
                            
                            <div class="datos">
                                <div class="nombreylema">
                                    <h2><xsl:value-of select="nombrec"/></h2>
                                    <p><b>Lema: <xsl:value-of select="lema"/></b> </p>
                                </div>
                                <p><b>Asentamiento: <xsl:value-of select="asentamiento"/></b> </p>
                                <p><b>Region: <xsl:value-of select="region"/></b> </p>
                                <p><b>Fundación: <xsl:value-of select="fundacion"/></b> </p>
                            </div>
                            
                            <div class="descripcion">
                                <h3>Descripción</h3>
                                <p><xsl:value-of select="descripcion"/></p>
                            </div>
                            
                            <div class="integrantes">
                                <div class="miembros">
                                    <h3>Progenitores</h3>
                                    <p><xsl:value-of select="miembros/padre"/></p>
                                    <p><xsl:value-of select="miembros/madre"/></p>
                                </div>
                                
                                <div class="miembros">
                                    <h3>Descendientes</h3>
                                    <ul>
                                    <xsl:for-each select="miembros/descendientes/hijo">
                                        <li><xsl:value-of select="nombre"/> 
                                        (<xsl:value-of select="legitimidad/@tipo"/>)</li>
                                    </xsl:for-each>
                                    </ul>
                                </div>
                                
                                <div class="miembros">
                                    <h3>Vasallos</h3>
                                    <ul>
                                    <xsl:for-each select="miembros/vasallos/vasallo">
                                        <li><xsl:value-of select="nombre"/> (<xsl:value-of select="titulo"/>)</li>
                                    </xsl:for-each>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </xsl:for-each>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet> 