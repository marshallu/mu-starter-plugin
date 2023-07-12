module.exports = {
  presets: [
    require('@marshallu/marsha-tailwind')
  ],
	purge: {
		content: [
			'./*.php',
			'./**/*.php',
		],
	}
}
