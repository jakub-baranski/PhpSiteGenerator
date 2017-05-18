<div class="container">
    <div class="jumbotron">
        <h1>GENERATOR BETA!</h1>
        <p>Witaj! Ten generator w założeniu ma on pozwalać na wybranie kluczowych atrybutów strony, a następnie wygenerowanie plików HTML i CSS kodujących jej wygląd. Zestaw plikow tworzony jest w formacie .zip!</p>

    </div>
    <div class="generator-body col-xs-12">
        <h2>INFORMACJE PODSTAWOWE</h2>
        <div class="form-group row">
            <label for="title" class="col-md-2">Tytuł strony</label>
            <div class="col-md-10">
                <input class="form-control" id="titleInput" type="text" value="Przykladowy tytul" required=""/>
            </div>
        </div>
        <h2>SZCZEGÓŁY WYGLĄDU</h2>
        <div class="row">
            <label class="col-md-2">Panele boczne:</label>
            <div class="col-md-10">
                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            <input id="leftCheck" type="checkbox" value="left">
                            <strong>Panel z lewej strony</strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-1">
                    <input id="leftPanelColor" class="form-control" type="color" value="#9bb3bf"/>
                </div>

                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            <input id="rightCheck" type="checkbox" value="right">
                            <strong>Panel z prawej strony</strong>
                        </label>
                    </div>
                </div>
                <div class="col-md-1">
                    <input id="rightPanelColor" class="form-control" type="color" value="#9bb3bf"/>
                </div>
            </div> 
        </div>
        <!--        <div class="form-group row">
                    <label class="col-md-2 col-md-offset-2">Kolor panelu lewego</label>
                    <div class="col-md-1">
                        <input id="leftPanelColor" class="form-control" type="color" value="#9bb3bf"/>
                    </div>
                    <label class="col-md-2">Kolor panelu prawego</label>
                    <div class="col-md-1">
                        <input id="rightPanelColor" class="form-control" type="color" value="#9bb3bf"/>
                    </div>
                </div>-->

        <h2>Nagłówek i stopka</h2>

        <p>Nagłówek</p>
        <div class="form-group row">
            <label class="col-md-2">Napis główny</label>
            <div class="col-md-10">
                <input id="headerTitle" class="form-control" type="text" value="Nagłowek"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Napis dodatkowy</label>
            <div class="col-md-10">
                <input id="headerSubtitle" class="form-control" type="text" value="Tekst pod naglowkiem"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Kolor nagłówka: </label>
            <div class="col-md-1">
                <input id="headerColor" class="form-control" type="color" value="#1c292f"/>
            </div>
            <label class="col-md-2 text-right">Kolor tekstu:</label>
            <div class="col-md-1">
                <input id="headerColorText" class="form-control" type="color" value="#5f6387"/>
            </div>
            <label class="col-md-2 text-right">Wysokość nagłówka</label>
            <div class="slider col-md-4">
                <input id="headerHeight" type="range" min="200" max="350" value="250"/>
                <label>250 px</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Wyrównanie: </label>
            <div class="col-md-2">
                <select id="headerAlign" class="form-control col-md-2">
                    <option value="left">Lewe</option>
                    <option value="right">Prawe</option>
                    <option value="center">Środkowe</option>
                    <option value="justify">Wyjustowane</option>
                </select> 
            </div>
        </div>
        <div class="row">
            <div class="preview preview1 col-xs-6 col-md-2 col-md-offset-2 thumbnail">
            </div>
            <div class="preview preview2 col-xs-6 col-md-2 col-md-offset-1 thumbnail">
            </div>
            <div class="preview preview3 col-xs-6 col-md-2 col-md-offset-1 thumbnail">
            </div> 
        </div>

        <p>Stopka</p>
        <div class="form-group row"> 
            <label class="col-md-2">Napis główny</label>
            <div class="col-md-10">
                <input id="footerTitle" class="form-control" type="text" value="Copyright JB 2016"/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2">Napis dodatkowy</label>
            <div class="col-md-10">
                <input id="footerSubtitle" class="form-control" type="text" value="Mniejszy napis"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 ">Kolor stopki</label>
            <div class="col-md-1">
                <input id="footerColor" class="form-control" type="color" value="#1c292f"/>
            </div>
            <label class="col-md-2 text-right">Kolor tekstu:</label>
            <div class="col-md-1">
                <input id="footerColorText" class="form-control" type="color" value="#000000"/>
            </div>
            <label class="col-md-2 text-right">Wysokość stopki</label>
            <div class="slider col-md-4">
                <input id="footerHeight" type="range" min="100" max="200" value="150"/>
                <label>150 px</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Wyrównanie: </label>
            <div class="col-md-2">
                <select id="footerAlign" class="form-control col-md-2">
                    <option value="left">Lewe</option>
                    <option value="right">Prawe</option>
                    <option value="center">Środkowe</option>
                    <option value="justify">Wyjustowane</option>
                </select> 
            </div>
        </div>

        <p>Nawigacja</p>
        <div class="form-group row">
            <label class="col-md-2"> Wybierz pozycję paska nawigacyjnego:</label>
            <div class="col-md-2">
                <select id="navbarPos" class="form-control">
                    <option value="left">Panel Lewy</option>
                    <option value="right">Panel Prawy</option>
                    <option value="top" selected="selected">Pasek Górny</option>
                    <option value="bottom">Pasek Dolny</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Kolor paska</label>
            <div class="col-md-1">
                <input id="navbarColor" class="form-control" type="color" value="#77767f"/>
            </div>
            <label class="col-md-2 text-right">Kolor tekstu:</label>
            <div class="col-md-1">
                <input id="navbarColorText" class="form-control" type="color" value="#000000"/>
            </div>
        </div>

        <div class=" form-group row">
            <label class="col-md-2"> Dodaj odnośniki:</label>
            <div class="links col-md-10">
                <div class="form-group row">
                    <label class="col-md-1"> Nazwa:</label>
                    <div class="col-md-5">
                        <input class="linkNameInput form-control" type="text" value="Link"/>
                    </div>
                    <label class="col-md-1"> Link:</label>
                    <div class="col-md-5">
                        <input class="linkUrlInput form-control" type="text" value="#"/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-1"> Nazwa:</label>
                    <div class="col-md-5">
                        <input class="linkNameInput form-control" type="text" value="Link2"/>
                    </div>
                    <label class="col-md-1"> Link:</label>
                    <div class="col-md-5">
                        <input class="linkUrlInput form-control" type="text" value="#"/>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-offset-3">
                <button id="addBtn" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span></button><button id="removeBtn" class="btn btn-primary"><span class="glyphicon glyphicon-minus"></span></button>
            </div>
        </div>


        <p>Treść</p>
        <div class="form-group row">
            <label class="col-md-2">Nagłówek</label>
            <div class="col-md-10">
                <input id="contentTitle" class="form-control" type="text" value="Tytuł artykułu"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Treść</label>
            <div class="col-md-10">
                <textarea id="contentText" class="form-control" rows="5">{Marek|Łukasz|{Lucjan|Stefan}} jest totalnym {Geniuszem|Bucem|Frajerem|Idiotą}.
Kiedy {Mariusz|Euzebiusz|Michał} {był|przebywał|lubił być| siedział | heheszkował} w {psychiatryku|więzieniu|sklepie|kostnicy|domu}, {Mariola|Łucja|Katarzyna|Dobrawa} szykowała {obiad|pogrzeb|przyjęcie|heheszki|karnawał|piniatę|meksykańskie zapasy|bitwę w kisielu} wraz z {przygłupią|wierną|piękną|obleśną|przygnębioną|lubianą|wyszydzaną} {Elżbietą|Marią|Karoliną|Elżbietą}. {Ja pierdziele!|Oh nie!| Srututu!| Karamba!| Niech to dunder świśnie!| Obrzydlistwo!} wykrzyknęła jakby była {przerażona|głupia|strachliwa|zdenerwowana|wkurzona|przygłupia|upośledzona|dotknięta zespołem Touretta|Zheheszkowana do cna}.</textarea>
            </div> 
        </div>
        <div class="form-group row">
            <label class="col-md-2">Kolor tła: </label>
            <div class="col-md-1">
                <input id="contentColor" class="form-control" type="color" value="#d0d0d0"/>
            </div>
            <label class="col-md-2 text-right">Kolor tekstu:</label>
            <div class="col-md-1">
                <input id="contentColorText" class="form-control" type="color" value="#000000"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">Wyrównanie: </label>
            <div class="col-md-2">
                <select id="contentAlign" class="form-control col-md-2">
                    <option value="left">Lewe</option>
                    <option value="right">Prawe</option>
                    <option value="center">Środkowe</option>
                    <option value="justify">Wyjustowane</option>
                </select> 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-xs-6 synonimizer">Synonimizator  <span class="btn glyphicon glyphicon-question-sign" data-toggle="popover" data-placement="top" title="Synonimizator"  data-content="Synonimizator pozwala na tworzenie unikalnych tresci poprzez podanie synonimow w tresci tekstu(przykladowo {Marek|Ludwig|Stefan}"></span></label>
            <div class="col-md-10 col-xs-6 checkbox">
                <input id="synonimizerCheckbox" type="checkbox" data-toggle="toggle"/>
                <button class="btn btn-primary" data-toggle="modal" data-target="#settings"> Ustawienia  <span class="glyphicon glyphicon-cog settingsCog"></span></button>

            </div>
            <div class="modal fade" id="settings" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Ustawienia synonimizatora</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-xs-5">Ustaw delimiter</label>
                                <div class="col-xs-5">
                                    <input id="synonimizerDelimiter" type="text" value="|" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xs-5">Ustaw znak otwierający</label>
                                <div class="col-xs-5">
                                    <input id="synonimizerDelimiter" type="text" value="{" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xs-5">Ustaw znak zamykający</label>
                                <div class="col-xs-5">
                                    <input id="synonimizerDelimiter" type="text" value="}" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>-->
                            <button id="synonimizerMenuSave" type="button" class="btn btn-primary" data-dismiss="modal">Zapisz</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2">
                <button id="generateBtn" class="btn" type="submit">Generuj!</button>
                <button id="generateBtn" class="btn disabled" type="submit">Losuj!</button>
                <span id="status"></span>
            </div>
        </div>

    </div>
</div>