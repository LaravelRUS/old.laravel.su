<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="3.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:atom="http://www.w3.org/2005/Atom">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
            <head>
                <title>
                    RSS Feed | <xsl:value-of select="/atom:feed/atom:title"/>
                </title>
                <meta charset="utf-8"/>
                <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link rel="stylesheet" href="/vendor/feed/style.css"/>
            </head>
            <body>
                <main class="layout-content">
                    <h1 class="flex items-start">
                        <xsl:value-of select="/atom:feed/atom:title"/>
                    </h1>
                    <p>
                        <xsl:value-of select="/atom:feed/atom:subtitle"/>
                    </p>
                    <hr/>
                    <xsl:for-each select="/atom:feed/atom:entry">
                        <div class="post">
                            <div class="title">
                                <a>
                                    <xsl:attribute name="href">
                                        <xsl:value-of select="atom:link/@href"/>
                                    </xsl:attribute>
                                    <xsl:value-of select="atom:title"/>
                                </a>
                            </div>

                            <div class="summary">
                                <xsl:value-of select="atom:summary" disable-output-escaping="yes"/>
                            </div>

                            <div class="published-info">
                                Опубликовал
                                <xsl:value-of select="substring(atom:updated, 0, 11)" /> пользователь <xsl:value-of select="atom:author/atom:name"/>
                            </div>
                        </div>
                    </xsl:for-each>
                </main>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
