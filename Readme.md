# Radentscheid Wordpress Locations 🚲🗺📌
Dieses Wordpress-Plugin soll den Radaktivismus in Deutschland unterstützen und Radentscheide voran bringen. Ziel ist es, interessierten Bürger*innen ein Bild der Radinfrastruktur vor Ort zu vermitteln. Über ein Melden-Formular können Aktivist&#42;innen ganz einfach problematische Stellen mit Koordinaten und Bild melden. Administrator&#42;innen können diese dann auf einer interaktiven Karte für alle Menschen sichtbar freischalten. Zudem ist es möglich Unterschriftenstellen auf einer separaten Karte darzustellen.

Benutzt dieses Plugin einfach als Grundlage, verändert es und passt es euren Bedürfnissen an.

In Aktion kannst du das Plugin hier sehen: https://www.radentscheid-wuerzburg.de/problemstellen/

## Features
* Jede*r kann Problemstellen melden
* Problemstellen werden auf einer Karte dargestellt
* Marker können frei angelegt werden (Problemstellen, Unterschriftenstellen, Behobene Problemstellen, etc...)
* Alle eingereichten Orte müssen vorher im Backend freigeschaltet werden, bevor diese auf der Karte sichtbar sind
* Die Bilder liegen nicht im Medienmanager von Wordpress um diesen nicht zu "verstopfen"
* Bilder können im Backend einfach gedreht werden, da meldende Menschen oft nicht auf die Orientierung achten
* Im Backend können mehrere Bilder zu einer Stelle gepflegt werden
* Die Bilder können im Backend leicht getauscht werden, um beispielsweise Nummernschilder oder Gesichter schnell verdecken zu können
* Im Backend gibt es einen neuen Menupunkt "Locations"
* Der State der Karte wird im Hash der URL gespeichert. Somit können Kartenpositionen als Link verschickt werden
* Alle Locations verfügen nun über eigene Detailseiten und werden so durch Suchmaschinen indexiert
* Einfache Löschfunktion für Aktivistendaten
* Marker werden nun auf der Karte geklustert
* Öffentliche JSON-Api, um der Öffentlichkeit Zugriff auf die Location-Daten zu gewähren

## Installation
Das Plugin befindet sich (noch) nicht in der offiziellen Plugin-Datenbank von Wordpress. Bis dahin muss es manuell installiert werden. Es gibt zwei verschiedene Möglichkeiten für eine Installation.

### Installation über ein ZIP-Archiv

* Lade [hier](https://github.com/steampixel/RadentscheidWordpressLocations/tree/master/dist) das Plugin-Archiv in deiner wunsch-Version herunter und lade es über das Wordpress-Backend hoch. Achtung! Nutze nicht das Zip-Archiv, welches hier über den Button "Clone or download" bereitgestellt wird.
* Aktiviere das Plugin im Backend deiner Wordpress-Installation
* Binde die Shortcodes für Formulare und Karten auf deinen Seiten ein

### Installation über FTP / SSH

* Lade dieses Plugin herunter und kopiere es nach ```wp-content/plugins/sp-locations```
* Aktiviere das Plugin im Backend deiner Wordpress-Installation
* Binde die Shortcodes für Formulare und Karten auf deinen Seiten ein

## Update

Nutze zum Update entweder ZIP-Archive, wie bei der Installation oder überschreibe einfach alle Plugin-Dateien via FTP oder SSH.

### Update auf Version 1.5.0
Bei diesem Update werden automatisch Daten mirgriert. Alle Thumbnails werden beim ersten Aufrufen der Seite neu generiert. Dies kann dazu führen, dass die Seite sehr lange lädt. In Abhängigkeit von der Anzahl der Thumbnails und Locations kann es auch zu einer Fehlermeldung kommen, da die maximale Script-Laufzeit erreicht wurde. Lade in diesem Fall die Seite neu, damit die Migration fortgesetzt werden kann. Wenn es sehr viele Daten zum migrieren gibt, musst du die Seite evtl. öffter neu laden und kannst unter Umständen öfter einen Timeout-Fehler sehen. Sobald die Migration abgeschlossen ist, wird die Website wieder normal funktionieren. Die Migration löscht die alten Daten vorsichthalber nicht. Du kannst diese daher wenn du möchtest selbst löschen. Lösche dazu alle Bilder, die sich direkt in wp-content/uploads/sp-locations befinden. Lösche auch den Ordner thumbs in diesem Verzeichnis. Die Anderen numerischen Verzeichnisse sind die neue migrierten Daten. Diese sollen bitte bleiben.

## Shortcodes

### Melden-Formular
Mit diesem Shortcode bindest du das Melden-Formular ein:
```
[steampixel-marker-form selected-type="problem" require-address="false" show-opening-hours="false" require-image="true" name-label="Name der Problemstelle" name-placeholder="Bsp: Radweg in schlechtem Zustand" file-placeholder="Lade ein Bild der Problemstelle hoch. Bitte nimm uns etwas Arbeit ab und schwärze ggf. Kennzeichen und Gesichter." submit-value="Problemstelle melden" require-personal-data="false"]
```

Parameter:
* selected-type: Der Schlüssel des Markers, der gemeldet werden soll. Also zum Beispiel "problem", "sign", "solved" oder eigene Marker.
* require-address: "true" oder "false" Ist die Angabe einer Adresse erforderlich?
* show-description: "true" oder "false" Ist das Beschreibungsfeld sichtbar?
* show-opening-hours: "true" oder "false" Öffnungszeiten-Feld anzeigen?
* require-image: "true" oder "false" Ist das Bild ein Pflichtfeld?
* name-label: Das Label des Namensfeldes
* name-placeholder: Der Placeholder des Namensfeldes
* file-label: Das Label für das Bild
* file-placeholder: Der Placeholder für das Bild
* submit-value: Der Wert des Absenden-Buttons
* require-personal-data: "true" oder "false" Ist die Angabe von persönlichen Informationen Pflicht?
* lat: Start-Latitude des Kartenfeldes zum Beispiel "49.78"
* lng: Start-Longitude des Kartenfeldes zum Beispiel "9.94"
* zoom: Start-Zoom des Kartenfeldes zum Beispiel "13"

Bitte denke daran, dass derzeit immer nur ein Shortcode pro Seite eingebunden werden kann. Es ist noch nicht möglich den selben Shortcode auf einer Seite mehrfach zu benutzen.

### Interaktive Karte einbinden
Mit diesem Shortcode erstellst du eine interaktive Karte:
```
[steampixel-marker-map height="100vh" type="problem" button-label="Problemstelle melden" button-link="https://verkehrswende-wuerzburg.de/radentscheid/mitmachen/problemstellen-melden/"]
<h2>Problemstellen in Würzburg</h2>
Auf dieser interaktiven Karte kannst du dich über die Situation der Radinfrastruktur in Würzburg informieren. Wir haben zahlreiche Problemstellen dokumentiert. Wenn du selbst problematische Orte melden möchtest, kannst du das <a href="https://verkehrswende-wuerzburg.de/radentscheid/mitmachen/problemstellen-melden/">auf dieser Seite</a> tun.
[/steampixel-marker-map]
```
Der Inhalt dieses Shortcodes wird, wenn vorhanden in einem Begrüßungspopup angezeigt.

Parameter:
* height: Höhe der Karte in px, %, vh, etc. zum Beispiel "400px"
* lat: Start-Latitude zum Beispiel "49.78"
* lng: Start-Longitude zum Beispiel "9.94"
* zoom: Start-Zoom zum Beispiel "13"
* type: Die Schlüssel der Marker, die auf der Karte dargestellt werden sollen. Beispiel: "problem", "sign" oder multiple Marker mit Komma getrennt: "sign, problem"
* button-label: Die Aufschrift des Buttons, der über der Karte schwebt
* button-link: Die Link-URL des Buttons, der über der Karte schwebt

Bitte denke daran, dass derzeit immer nur ein Shortcode pro Seite eingebunden werden kann. Es ist noch nicht möglich den selben Shortcode auf einer Seite mehrfach zu benutzen.

### Anzahl der aktiven Meldungen ausgeben
Mit diesem Shortcode kannst du die Anzahl der aktiven Meldungen ausgeben. So kannst du die Zahl direkt in einem Text verwenden.
```
[steampixel-marker-count type="problem"]
```
Parameter:
* type: Die Schlüssel der Marker, die gezählt werden sollen. Beispiel: "problem", "sign" oder multiple Marker mit Komma getrennt: "sign, problem"

## Informationen für Entwickler&#42;innen
Dieses Plugin entstand in einer Nacht- und Nebelaktion und wurde zwischen Tür und Angel weiterentwickelt. Dementsprechend sehen auch einige Stellen im Code aus. Bitte schreckt nicht davor zurück Dinge zu korrigieren, Verbesserungen einzubauen und Pull-Requests zu senden. Es gibt bisher noch keine wirkliche Dokumentation. Daher hier erstmal ein paar grobe Zeilen:

Um die Entwicklung des Plugins einer breiten Masse zu öffnen wurden die Standards sehr weit runtergeschraubt. Es gibt keine Abhängigkeiten bis auf Leaflet. Alles andere ist selbst gebaut. Kein jQuery, kein ES6, kein Bootstrap, keine fancy Frameworks.

Je nach dem, wie es erforderlich ist, kann ich die Doku hier noch etwas "aufhübschen". Fragen bitte einfach in die Issues.

## Öffentlich Api
Alle Locations, die im Backend freigeschaltet werden, sind über eine einfache öffentliche API des Plugins im JSON-Format einsehbar. Das Plugin sorgt somit dafür, dass öffentliche Daten auch öffentlich zugänglich bleiben und durch andere Menschen frei nutzbar sind. Du erreichst die Daten unter https://www.deine-domain.de/api/locations.
Hier kannst du ein Beipsiel sehen: https://www.radentscheid-wuerzburg.de/api/locations

## Grenzen des Plugins
Momentan werden immer alle relevanten Punkte für eine Karte direkt geladen. Das macht natürlich nur dann Sinn, solange die Meldungen in einem gewissen Rahmen bleiben. Diese Karte unterstützt zur Zeit nicht das dynamische Laden von Koordinaten, je nach gezeigtem Kartenausschnitt. Für wirklich große Städte mit tausenden von Koordinaten ist das Plugin in der jetzigen Form daher noch ungeeignet und müsste etwas umgebaut werden.

## Credits
Map marker icons: https://github.com/mrmichalzik

## License
This project is licensed under the MIT License. See LICENSE for further information.
