import React, {useEffect, useState} from 'react';
import '../../public/css/app.css';
import axios from 'axios';
import ListInfo from './components/Listinfo';
import {API_URL} from './config.json';
import InitialState from './initialState';
axios.defaults.headers.common['X-CSRF-TOKEN'] = window.token;
const App = () => {

    const [weather, setWeather] = useState(InitialState);
    const [search, setSearch] = useState("Омск");
    const [query, setQuery] = useState('Омск');
    const [units, setUnits] = useState('metric');

    // metric
    //imperial

    const urlReq = `${API_URL}/api/get-data?q=${query}&units=${units}`;

    useEffect(() => {
        getWeather();
    }, [query, units]);

    /**
     * get Data from API
     * @returns {Promise<void>}
     */
    const getWeather = async () => {
        const response = await axios.get(urlReq);
        setWeather(response.data);
    };

    /**
     * Handler input search
     * @param e
     */
    const updateSearch = e => {
        setSearch(e.target.value);
    };
    /**
     *
     * Form submit
     * @param e
     */
    const getSearch = e => {
        e.preventDefault();
        setQuery(search);
    };
    /**
     *  Handler switcher Temp
     * @param e
     */
    const handleClick = e => {
        let outputValue;
        if (e.target.checked === true) {
            outputValue = 'imperial';
        } else {
            outputValue = 'metric';
        }
        setUnits(outputValue);

    };

    const infoLists = [
        {
            id: '1',
            title: 'Ветер',
            contentOne: `${weather.wind.speed}`,
            contentTwo: `м/с, ${weather.wind.deg}`,
        },
        {
            id: '2',
            title: 'Давление',
            contentOne: `${parseInt(weather.main.pressure * 0.7500620)}`,
            contentTwo: `мм рт. ст.`,
        },
        {
            id: '3',
            title: 'Влажность',
            contentOne: `${weather.main.humidity} %`,
            contentTwo: '',
        },
        {
            id: '4',
            title: 'Вероятность дождя',
            contentOne: `${weather.clouds.all} %`,
            contentTwo: '',
        }
    ];

    return (
        <div className="app">
            <div className="container">
                <div className="row">
                    <div className="col-md-12 col-sm-12">
                        <div className="wrapper">
                            <div className="top">
                                <form id="main-form" onSubmit={getSearch}>
                                    <div className="field d-flex align-items-start  justify-content-between">
                                        <div className="search-bar d-flex  justify-content-between">
                                            <input type="text" name="q"
                                                   value={search}
                                                   onChange={updateSearch}/>
                                            <button type="submit" className="search-button">
                                                ОК
                                            </button>
                                        </div>
                                        <div className="switch-block d-flex align-items-center">
                                            <span>{(units === 'metric') ? 'O' : 'F'}</span>
                                            <div className="button b2" id="button-10">
                                                <input type="checkbox"
                                                       className="checkbox"
                                                       onChange={handleClick}
                                                />
                                                <div className="knobs">
                                                    <span>C</span>
                                                </div>
                                                <div className="layer"></div>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div className="center align-content-center justify-content-center">
                                <div className="center-wrap">
                                    <div className="d-flex align-content-center">
                                        <div className="icon">
                                            <img src="/images/cloudy.png" alt="Иконка"/>
                                        </div>
                                        <div className="temp  d-flex align-items-center">
                                            <div className="position-relative">
                                                {parseInt(weather.main.temp)}
                                                <span>{(units === 'metric') ? 'O' : 'F'}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="w-100 description">
                                        {weather.weather[0].description}
                                    </div>
                                </div>

                            </div>
                            <div className="bottom">
                                <div className="row  justify-content-between">
                                    {infoLists.map(info => (
                                        <ListInfo key={info.id} title={info.title} contentOne={info.contentOne}
                                                  contentTwo={info.contentTwo}/>
                                    ))}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    );
};
export default App;