import datepicker from 'js-datepicker';

export function init_calendario()
{
	const picker = datepicker('.calendario-input', {
		startDay: 0, // Calendar week starts on a Monday.
		customDays: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
		customMonths: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		formatter: (input, date, instance) => {
			const value = pad(date.getDate())+"/"+pad(date.getMonth()+1)+"/"+date.getFullYear();
			input.value = value // => '1/1/2099'
		},

		// Settings.
		dateSelected: new Date(), // Today is selected.
		maxDate: new Date(2099, 0, 1), // Jan 1st, 2099.
		minDate: new Date(), // June 1st, 2016.
		startDate: new Date(), // This month.

		// Disabling things.
		// noWeekends: false, // Saturday's and Sunday's will be unselectable.
		// disabler: date => (date.getDay() === 2 && date.getMonth() === 9), // Disabled every Tuesday in October
		// disabledDates: [new Date(2050, 0, 1), new Date(2050, 0, 3)], // Specific disabled dates.
		// disableMobile: true, // Conditionally disabled on mobile devices.
		// disableYearOverlay: true, // Clicking the year or month will *not* bring up the year overlay.

		// Id - be sure to provide a 2nd picker with the same id to create a daterange pair.
		id: 1
	});
}

function pad(n) {return n < 10 ? "0"+n : n;}