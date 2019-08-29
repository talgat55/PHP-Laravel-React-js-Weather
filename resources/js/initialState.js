export default   () => {
    return (
        {
            main: {
                temp: '0',
                pressure: '0',
                humidity: '0',
            },
            wind: {
                speed: '0',
                deg: '',

            },
            weather: [{
                description: '-',
                icon: ''
            }],
            clouds: {
                all: '0'
            }

        }
    );
}