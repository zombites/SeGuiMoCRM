<?php
namespace SeGuiMo\CRMBundle\EventListener;

// ...

use SeGuiMo\CRMBundle\Model\MenuItemModel;
use Avanzu\AdminThemeBundle\Event\SidebarMenuEvent;
use Symfony\Component\HttpFoundation\Request;

class MenuItemListEvent {

    public function onSetupMenu(SidebarMenuEvent $event) {

        $request = $event->getRequest();

        foreach ($this->getMenu($request) as $item) {
            $event->addItem($item);
        }

    }

    protected function getMenu(Request $request) {
        // retrieve your menuItem models/entities here
        // $menuItems = array();
		
        $earg      = array();
        $menuItems = array(
            $personas = new MenuItemModel('personas', 'Personas', 'personas', $earg, 'fa fa-users'),
            $nodos = new MenuItemModel('nodos', 'Nodos', 'nodos', $earg, 'fa fa-circle'),
            $nodos = new MenuItemModel('personashasnodos', 'Personas «•» Nodos', 'personashasnodos', $earg, 'fa fa-puzzle-piece'),
            $materiales = new MenuItemModel('materiales', 'Materiales', '', $earg, 'fa fa-pencil'),
            $docs = new MenuItemModel('documentos', 'Documentos', 'documentos', $earg, 'fa fa-folder'),
            $contable = new MenuItemModel('contable', 'Contabilidad', '', $earg, 'fa fa-money'),
        );

        $contable->addChild(new MenuItemModel('cuentas', 'Cuentas', 'cuentas', $earg))
            ->addChild(new MenuItemModel('diario', 'Libro diario', 'librodiario', $earg));

		$materiales->addChild(new MenuItemModel('matfun', 'Materiales fungibles', 'materialesfungibles', $earg))
        	->addChild(new MenuItemModel('matred', 'Materiales de red', 'materialesred', $earg));


        return $this->activateByRoute($request->get('_route'), $menuItems);
    }

    protected function activateByRoute($route, $items) {

        foreach($items as $item) {
            if($item->hasChildren()) {
                $this->activateByRoute($route, $item->getChildren());
            }
            else {
                if($item->getRoute() == $route) {
                    $item->setIsActive(true);
                }
            }
        }

        return $items;
    }

}