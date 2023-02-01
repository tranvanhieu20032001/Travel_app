package com.example.travelapp.service;
import com.example.travelapp.model.Service;
import com.example.travelapp.repository.ServiceRepository;
import org.springframework.beans.factory.annotation.Autowired;


import java.util.List;

@org.springframework.stereotype.Service
public class ServiceService {
    @Autowired
    ServiceRepository serviceRepository;
    public List<Service> getAllService(){
        return serviceRepository.findAll();
    }
}
