package com.example.travelapp.model;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import org.springframework.beans.factory.annotation.Autowired;

import javax.persistence.*;

@Entity
@Table(name = "tour_service")
@Data
@NoArgsConstructor
@AllArgsConstructor
public class TourService {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    @ManyToOne
    @JoinColumn(name="tour_id")
    private TourEntity tour;


    @ManyToOne
    @JoinColumn(name="service_id")
    private Service service;

    public TourService(TourEntity tour, Service service) {
        this.tour = tour;
        this.service = service;
    }
}
