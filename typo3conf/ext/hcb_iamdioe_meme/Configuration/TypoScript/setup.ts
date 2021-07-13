
plugin.tx_hcbiamdioememe_fememegenerator {
    view {
        templateRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememegenerator.view.templateRootPath}
        partialRootPaths.0 = EXT:hcb_iamdioe_meme/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememegenerator.view.partialRootPath}
        layoutRootPaths.0 = EXT:hcb_iamdioe_meme/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememegenerator.view.layoutRootPath}
    }
    persistence {
        // storagePid = {$plugin.tx_hcbiamdioememe_fememegenerator.persistence.storagePid}
        // #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_hcbiamdioememe_fememelist {
    view {
        templateRootPaths.0 = EXT:{extension.extensionKey}/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememelist.view.templateRootPath}
        partialRootPaths.0 = EXT:hcb_iamdioe_meme/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememelist.view.partialRootPath}
        layoutRootPaths.0 = EXT:hcb_iamdioe_meme/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_hcbiamdioememe_fememelist.view.layoutRootPath}
    }
    persistence {
        // storagePid = {$plugin.tx_hcbiamdioememe_fememelist.persistence.storagePid}
        // #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

config.tx_extbase {
    persistence {
        classes {
            HcbIamDioeMeme\HcbIamdioeMeme\Domain\Model\FileReference {
                mapping {
                        tableName = sys_file_reference
                    columns {
                        uid_local.mapOnProperty = originalFileIdentifier
                    }
                }
            }
        }
        objects {
            TYPO3\CMS\Extbase\Domain\Model\FileReference.className = Vendor\Ext\Domain\Model\FileReference
        }
        updateReferenceIndex = 1
    }
}

ajaxsfememegenerator_page = PAGE
ajaxsfememegenerator_page {
    typeNum = 78376261
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type:application/html
        xhtml_cleaning = 0
        debug = 0
        no_cache = 1
        admPanel = 0
    }
    10 < tt_content.list.20.hcbiamdioememe_fememegenerator
}

ajaxsfememelist_page = PAGE
ajaxsfememelist_page {
    typeNum = 78376262
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type:application/html
        xhtml_cleaning = 0
        debug = 0
        no_cache = 1
        admPanel = 0
    }
    10 < tt_content.list.20.hcbiamdioememe_fememelist
}
